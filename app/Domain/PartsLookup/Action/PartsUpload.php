<?php
declare(strict_types=1);

namespace App\Domain\PartsLookup\Action;

use App\Domain\PartsLookup\Models\Part;
use Illuminate\Support\Facades\DB;
use App\Models\Heater;

class PartsUpload
{
    public function getExcelParam()
    {
        return [
            'part_list_id',
            'keyword', 'part_description_en', 'part_number', 'available_for_sale', 'version', 'sequence', 'upgrade_reason_en',
            'ApplicableModels', 'part_description_jp', 'upgrade_reason_jp'
        ];
    }
    public function import($parts = '')
    {
        $returnArray = ['status'=> true, 'msg'=> ''];
        try {
            if ($parts && $parts != '') {
                DB::transaction(function () use ($parts) {
                    $line_array = explode("\n", $parts);
                    // print_r($line_array);
                    foreach ($line_array as $k => $la) {
                        $row = explode("\t", $la);
                        try {
                            $part = Part::where('part_list_id', $row[0])->where('part_number', $row[3])->first();
                        } catch (\Exception $e) {
                            $l = ++$k;
                            throw new \Exception("Error Line(s) : $l. please check data and try again.");
                        }

                        $insertArray = [
                            'part_list_id' => $row[0],
                            'keyword' => $row[1],
                            'part_description_en' => $row[2],
                            'part_number' => $row[3],
                            'available_for_sale' => isset($row[4])?$row[4]:'',
                            'version' => isset($row[5])?$row[5]:'',
                            'sequence' => isset($row[6])?$row[6]:'',
                            'upgrade_reason_en' => isset($row[7])?$row[7]:'',
                            'part_description_jp' => isset($row[9])?$row[9]:'',
                            'upgrade_reason_jp' => isset($row[10])?$row[10]:''
                        ];
                        if (!$part) {
                            $part =  Part::create($insertArray);
                        } else {
                            $part->update($insertArray);
                        }
                        if (isset($row[8])) {
                            $applicablemodels = array_map('trim', explode(';', $row[8]));
                            // model_no
                            $h = Heater::whereIn('model_no', $applicablemodels)->pluck('id')->toArray();
                            if (count($h) > 0) {
                                $part->heaters()->sync($h);
                            }
                        }
                    }
                });
            }
        } catch (\Exception $e) {
            $returnArray['msg'] =  $e->getMessage();
            $returnArray['status'] = false;
        }
        return $returnArray;
    }
}
