<?php

declare(strict_types=1);

namespace App\Domain\ClaimForms\Http\Controllers;

use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Http\Request;
use Laravel\Jetstream\Jetstream;
use Illuminate\Routing\Controller;
use App\Domain\ClaimForms\Enums\YesNo;
use App\Domain\ClaimForms\Enums\GasType;
use Laravel\Jetstream\RedirectsActions;
use App\Domain\ClaimForms\Enums\ChargeParty;
use Illuminate\Support\Facades\Validator;
use App\Domain\ClaimForms\Enums\UsStateEnums;
use App\Domain\ClaimForms\Models\RMAClaimForm;
use App\Domain\ClaimForms\Enums\PurchaseReturn;
use App\Domain\ClaimForms\Models\RGA1ClaimForm;
use App\Domain\ClaimForms\Models\RGA2ClaimForm;
use App\Domain\ClaimForms\Enums\ApplicationType;
use App\Domain\ClaimForms\Enums\ReplacementCredit;
use App\Domain\ClaimForms\Enums\PreApproveRepairTotals;
use App\Domain\ClaimForms\Actions\RMAClaimForm\CreateRMAClaimFormAction;
use App\Domain\ClaimForms\Actions\RGA1ClaimForm\CreateRGA1ClaimFormAction;
use App\Domain\ClaimForms\Actions\RGA2ClaimForm\CreateRGA2ClaimFormAction;
use App\Domain\ClaimForms\Actions\RMAClaimForm\NotifyAboutSubmissionAction as RMANotifyAboutSubmissionAction;
use App\Domain\ClaimForms\Actions\RGA1ClaimForm\NotifyAboutSubmissionAction as RGA1NotifyAboutSubmissionAction;
use App\Domain\ClaimForms\Actions\RGA2ClaimForm\NotifyAboutSubmissionAction as RGA2NotifyAboutSubmissionAction;
use Mail;
use Illuminate\Support\Facades\Artisan;

class ClaimFormController extends Controller
{
    use RedirectsActions;

    /**
     * Display a listing of the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Inertia\Response
     */
    public function index(Request $request) : Response
    {
        $yes_no = YesNo::choices();
        return Jetstream::inertia()->render($request, 'ClaimForm/Index', [
            'yes_no' => $yes_no
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Inertia\Response
     */
    public function getRmaForm(Request $request) : Response
    {
        $ChargeParty = ChargeParty::choices();
        $GasType = GasType::choices();
        $ApplicationType = ApplicationType::choices();
        $YesNo = YesNo::choices();
        $PreApproveRepairTotals = PreApproveRepairTotals::choices();
        $usStateEnums = UsStateEnums::choices();

        return Jetstream::inertia()->render($request, 'ClaimForm/rma', [
            'ChargeParty' => $ChargeParty,
            'GasType' => $GasType,
            'ApplicationType' => $ApplicationType,
            'YesNo' => $YesNo,
            'PreApproveRepairTotals' => $PreApproveRepairTotals,
            'usStateEnums' => $usStateEnums
        ]);
    }

    public function storeRmaForm(Request $request)
    {

        $request->validate(RMAClaimForm::$createRules);
        $action = new CreateRMAClaimFormAction();
        $action->create($request->all());
        try {
        (new RMANotifyAboutSubmissionAction())
                            ->setFormType('RMA')
                            ->setFormData($request->all())
                            ->notify();
        } catch (\Exception $e) {
            // dd($e->getMessage(), $e);
        }

        return $this->redirectPath($action);

    }

    /**
     * Display a listing of the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Inertia\Response
     */
    public function getRga1Form(Request $request) : Response
    {
        return Jetstream::inertia()->render($request, 'ClaimForm/rga1', [
        ]);
    }

    public function storeRga1Form(Request $request)
    {
        $request->validate(RGA1ClaimForm::$createRules);
        $action = new CreateRGA1ClaimFormAction();
        $action->create($request->all());

        try {
            (new RGA1NotifyAboutSubmissionAction())
                            ->setFormType('RGA1')
                            ->setFormData($request->all())
                            ->notify();
        } catch (\Exception $e) {
            // dd($e->getMessage(), $e);
        }


        return $this->redirectPath($action);
    }

    /**
     * Display a listing of the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Inertia\Response
     */
    public function getRga2Form(Request $request) : Response
    {
        $PurchaseReturn = PurchaseReturn::choices();
        $ReplacementCredit = ReplacementCredit::choices();
        return Jetstream::inertia()->render($request, 'ClaimForm/rga2', [
            'PurchaseReturn' => $PurchaseReturn,
            'ReplacementCredit' => $ReplacementCredit
        ]);
    }

    public function storeRga2Form(Request $request)
    {
        $request->validate(RGA2ClaimForm::$createRules);
        $action = new CreateRGA2ClaimFormAction();
        $data = $request->all();
        $claim_photos = [];
        foreach($request->photos as $photo){
            if($photo){
                // $claim_photos[] = $photo->store('rga2');
                $claim_photos[] = $photo;
            }
        }
        $data['claim_photos'] = $claim_photos;
        $action->create($data);
        try {
            (new RGA2NotifyAboutSubmissionAction())
                            ->setFormType('RGA2')
                            ->setFormData($request->all())
                            ->notify();
        } catch (\Exception $e) {
            // dd($e->getMessage(), $e);
        }

        return $this->redirectPath($action);
    }

    public function formSuccess(Request $request, $type) : Response
    {
        return Jetstream::inertia()->render($request, 'ClaimForm/formSuccess', [
            'type' => $type
        ]);
    }

}
