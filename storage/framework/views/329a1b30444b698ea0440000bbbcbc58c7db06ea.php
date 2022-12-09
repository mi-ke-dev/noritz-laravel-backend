<?php //dd($heater_detail);?>
<section class="compare_product">
    <div class="w-container">
        <div class="w-row">
            <div class="w-col w-col-12 text-center">
                <h2 class="heading-12">Compare Noritz Tankless Water Heaters</h2>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
            </div>
        </div>

        <div class="priduct_title">
            <div class="w-row flex">

                <div class="w-col w-col-4 border">
                  <div class="w-full relative max-w-231 mr-2 mb-6">
                    <select wire:model="selectedEventStatus" name="auction_event_status"
                      id="heater_id" 
                      name="heater_id" 
                      class="heater_id block w-full h-14 pl-4 pr-16 py-2 text-gray-600 
                        uppercase focus:outline-none focus:ring-0 rounded-full 
                        appearance-none cursor-pointer text-sm text-left font-light 
                        tracking-widest"
                    >
                      <option value="">Choose Heater </option>
                      <?php if(@$heaters && count(@$heaters) > 0): ?>
                        <?php $__currentLoopData = @$heaters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $heater): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e(@$heater->id); ?>"><?php echo e(@$heater->model_no); ?> </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      <?php endif; ?>
                    </select>
                    <i class="bg-white fas fa-chevron-down absolute text-2xl text-gray top-2.5 right-0 w-14 h-7 flex justify-center items-center pointer-events-none border-l border-gray-400 mr-2 ml-2"></i>
                  </div>





                    <img src="/images/nrcr.jpg" alt="">
                    <h4 class="tnames"><?php echo e(@$heater_detail->model_no); ?></h4>
                </div>
                <!-- <div class="w-col w-col-4 border">
                    <img src="/images/nrcr.jpg" alt="">
                    <h4 class="tnames">NR83</h4>
                </div>
                <div class="w-col w-col-4 border">
                    <img src="/images/nrcr.jpg" alt="">
                    <h4 class="tnames">NR83</h4>
                </div> -->
            </div>
        </div>

        <div class="section_title">
            <div class="w-col w-col-12"><h2 class="heading-12">Overview</h2></div>
        </div>

        <div class="priduct_info">
            <div class="w-row flex">
                <div class="w-col w-col-4 border">
                    <h2><?php echo e(@$heater_detail->water_holding_capacity); ?></h2>
                    <p>Water Holding Capacity</p>
                    <h2><?php echo e(@$heater_detail->min_gas_input_btu); ?> - <?php echo e(@$heater_detail->max_gas_input_btu); ?></h2>
                    <p>BTU Input Range</p>
                    <h2><?php echo e(@$heater_detail->heat_exchanger_warranty_wrecirculation); ?></h2>
                    <p>Recirculation</p>
                    <h2><?php echo e(@$heater_detail->weight_lbs); ?> lbs</h2>
                    <p>Unit Weight</p>

                    <h2><?php echo e(@$heater_detail->width_in); ?> X <?php echo e(@$heater_detail->height_in); ?></h2>
                    <p>Unit Dimensions</p>

                    <h2><?php echo e(@$heater_detail->temperature_range); ?></h2>
                    <p>Temperature Range</p>


                    <?php if($heater_detail->feature_highlights): ?>
                    <div class="featuresection wf-section">
                        <div class="w-layout-grid ftgrid">
                            <?php $__currentLoopData = $heater_detail->feature_highlights; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature_highlight): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="helpblock">
                                <img src="<?php echo e(Storage::url($feature_highlight->icon_svg)); ?>"  loading="lazy" alt="" class="iconimage" onerror="this.src='<?php echo e(asset('images/HE_icon.png')); ?>'" >
                                <div class="icontext"><?php echo $feature_highlight->highlight; ?></div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </div>
                    </div>
                    <?php endif; ?>

                    <?php if(isset($heater_detail->feature_specs) && count($heater_detail->feature_specs)>0): ?>
                    <div class="w-layout-grid grid-3">
                        <?php $__currentLoopData = $heater_detail->feature_specs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$feature_specs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="specblocks <?php echo e((($key+1)%2==0)?'sright':''); ?>">
                                <h1 class="heading-5"><?php echo e($feature_specs->highlight); ?></h1>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <?php endif; ?>


                    
                    <!-- <h2><img src="/images/warranty-icon.png" alt=""></h2>
                    <p>Lorem Ipsum is simply</p>
                    <h3>200 feet (1/2")<br>500 feet (3/4")</h3>
                    <p>Lorem Ipsum is simply</p>
                    <h3>73 lbs.</h3>
                    <p>Lorem Ipsum is simply</p> -->
                </div>
                <!-- <div class="w-col w-col-4 border">
                    <h2>9.2</h2>
                    <p>Lorem Ipsum is simply</p>
                    <h2>18,000-165000</h2>
                    <p>Lorem Ipsum is simply</p>
                    <h2>0.97</h2>
                    <p>Lorem Ipsum is simply</p>
                    <h2><img src="/images/warranty-icon.png" alt=""></h2>
                    <p>Lorem Ipsum is simply</p>
                    <h3>200 feet (1/2")<br>500 feet (3/4")</h3>
                    <p>Lorem Ipsum is simply</p>
                    <h3>73 lbs.</h3>
                    <p>Lorem Ipsum is simply</p>
                </div>
                <div class="w-col w-col-4 border">
                    <h2>9.2</h2>
                    <p>Lorem Ipsum is simply</p>
                    <h2>18,000-165000</h2>
                    <p>Lorem Ipsum is simply</p>
                    <h2>0.97</h2>
                    <p>Lorem Ipsum is simply</p>
                    <h2><img src="/images/warranty-icon.png" alt=""></h2>
                    <p>Lorem Ipsum is simply</p>
                    <h3>200 feet (1/2")<br>500 feet (3/4")</h3>
                    <p>Lorem Ipsum is simply</p>
                    <h3>73 lbs.</h3>
                    <p>Lorem Ipsum is simply</p>
                </div> -->
            </div>
        </div>
    </div>
</section>


<style>
.compare_product {
    padding: 80px 0;
}
.w-container {
    max-width: 1230px;
    padding: 0 15px;
}
.text-center{
    text-align: center;
}
.compare_product .heading-12{
    text-align: center;
    padding: 0;
}
.priduct_title {
    margin-top: 40px;
}
.priduct_title img {
    max-width: 300px;
    margin: 0 auto;
    display: block;
}
.section_title {background: #f0f0f0;display: inline-block;width: 100%;margin: 40px 0 30px;}

.section_title h2.heading-12 {margin: 10px 0;text-transform: none;}

.priduct_title h4.tnames {
    font-size: 24px;
    border: none;
    padding: 0;
    margin: 40px auto 0;
    max-width: 100%;
}
.flex {
    display: flex;
    width: 100%;
    justify-content: center;
}
.flex .border+.border{
    border-left: 2px solid #c4c4c4;
}
.priduct_info {text-align: center;}

.priduct_info p {font-size: 16px;margin-bottom: 40px;}

.priduct_info h3 {font-family: 'Titillium Web', sans-serif;}
</style><?php /**PATH C:\xampp\htdocs\server\noritz-laravel-backend\resources\views/domain/website/products/livewire/compare.blade.php ENDPATH**/ ?>