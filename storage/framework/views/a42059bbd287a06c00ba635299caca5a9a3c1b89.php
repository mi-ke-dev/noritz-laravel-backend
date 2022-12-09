<div class="w-row">
    <div class="w-col w-col-2">
        <div class="div-block-10">
            <h4 id="w-node-_78aadab3-cb5d-d1b0-6a58-583a582873df-58d34ade" class="filterh">Applications</h4>
            <div>
                <div class="w-form">

                    <form id="email-form" name="email-form" data-name="Email Form" method="get">
                        <label class="w-radio">
                            <input type="checkbox" wire:model="heater_type" value="residential"
                            class="w-form-formradioinput w-radio-input">
                            <span class="w-form-label" >Residential</span>
                        </label>
                        <label class="w-radio">
                            <input type="checkbox" wire:model="heater_type" value="commercial"
                             class="w-form-formradioinput w-radio-input">
                            <span class="w-form-label" >Commercial</span>
                        </label>
                        <h4 class="filterh">SIZING</h4>
                        <label class="w-radio">
                            <input type="checkbox" wire:model="size"  id="radio-2" name="size"
                                value="two" class="w-form-formradioinput w-radio-input">
                            <span class="w-form-label" for="radio-2">1-2 Bedrooms</span>
                        </label>
                        <label class="w-radio">
                            <input type="checkbox" wire:model="size" id="radio-4" name="size"
                                value="four" class="w-form-formradioinput w-radio-input">
                            <span class="w-form-label" for="radio-4">3-4 Bedrooms</span>
                        </label>
                        <label class="w-radio">
                            <input type="checkbox" wire:model="size" id="radio-5" name="size"
                                value="five_above" class="w-form-formradioinput w-radio-input">
                            <span class="w-form-label" for="radio-5">5+ Bedrooms</span>
                        </label>
                        <h4 class="filterh">TYPE</h4>
                        <label class="w-radio">
                            <input type="checkbox" wire:model="type"  id="radio-8" name="type"
                                value="Easy Tank Replacement" class="w-form-formradioinput w-radio-input">
                            <span class="w-form-label" for="radio-8">Easy Tank Replacement</span>
                        </label>
                        <label class="w-radio">
                            <input type="checkbox" wire:model="type" id="radio-7" name="type"
                                value="Internal Recirc Pump" class="w-form-formradioinput w-radio-input">
                            <span class="w-form-label" for="radio-7">Internal Recirc Pump</span>
                        </label>
                        <label class="w-radio">
                            <input type="checkbox" wire:model="type" id="radio-6" name="type"
                                value="Combination Boiler" class="w-form-formradioinput w-radio-input">
                            <span class="w-form-label" for="radio-6">Combination Boiler</span>
                        </label>
                        <h4 class="filterh">EFFICIENCY</h4>
                        <label class="w-radio">
                            <input type="checkbox" wire:model="efficiency"  id="radio-10" name="efficiency"
                                value="High Efficiency" class="w-form-formradioinput w-radio-input">
                            <span class="w-form-label" for="radio-10">High Efficiency</span>
                        </label>
                        <label class="w-radio">
                            <input type="checkbox" wire:model="efficiency" id="radio-12" name="efficiency"
                                value="Mid Efficiency" class="w-form-formradioinput w-radio-input">
                            <span class="w-form-label" for="radio-12">Mid Efficiency</span>
                        </label>
                        <h4 class="filterh">Install Location</h4>
                        <label class="w-radio">
                            <input type="checkbox" wire:model="install_location"  id="radio-11"
                                name="install_location" value="Indoor Only" class="w-form-formradioinput w-radio-input">
                            <span class="w-form-label" for="radio-11">Indoor (DV)</span>
                        </label>
                        <label class="w-radio">
                            <input type="checkbox" wire:model="install_location"  id="radio-13"
                                name="install_location" value="Outdoor Only" class="w-form-formradioinput w-radio-input">
                            <span class="w-form-label" for="radio-13">Outdoor (OD)</span>
                        </label>
                        <h4 class="filterh">Features</h4>
                        <label class="w-radio">
                            <input type="checkbox" wire:model="features" id="radio-9" name="features"
                                value="Wifi Capable" class="w-form-formradioinput w-radio-input">
                            <span class="w-form-label" for="radio-9">Wifi Capable</span>
                        </label>
                        
                    </form>
                    <div class="w-form-done">
                        <div>Thank you! Your submission has been received!</div>
                    </div>
                    <div class="w-form-fail">
                        <div>Oops! Something went wrong while submitting the form.</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="column w-col w-col-10">
        <?php if(empty($heater_type)  && empty($size) && empty($type) && empty($features) && empty($install_location)
        && empty($efficiency)): ?>
            <?php if(!empty($heater_series)): ?>
                <div class="div-block-6">
                    <div id="w-node-_20de7921-7567-cdd1-2c33-64433101adfb-58d34ade" class="res">
                        <h2 class="heading-12"><?php echo e($heater_series->name); ?></h2>
                    </div>
                    <div class="div-block-7">
                        <div id="w-node-fa5280ac-07b0-1143-1ffe-64be91ef1f7c-58d34ade" class="text-block-4">
                            <a href="javascript:void(0);" wire:click="refresh()">RESET</a>
                        </div>
                    </div>
                </div>
                <div class="div-block-9">
                    <div class="w-layout-grid grid-11">
                        <?php if(!empty($heater_series->heaters)): ?>
                            <?php $__currentLoopData = $heater_series->heaters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $heater): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a href="<?php echo e($ifremUrl); ?>/products/<?php echo e($heater->model_no); ?>.html" target="_parent">
                                    <div>
                                        <img src="<?php echo e(Storage::url($heater->series_image)); ?>" loading="lazy" sizes="100vw" class="image-8" onerror="this.src='<?php echo e(asset('images/nrcr.jpg')); ?>'">
                                        <div>
                                            <h4 class="tnames"> <?php echo e($heater->model_no); ?></h4>
                                        </div>
                                    </div>
                                </a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </div>
                </div>
            <?php else: ?>
                <?php if(!empty($residental_heaters) && count($residental_heaters)>0): ?>
                    <div class="div-block-6">
                        <div id="w-node-_20de7921-7567-cdd1-2c33-64433101adfb-58d34ade" class="res">
                            <h2 class="heading-12">Residential</h2>
                        </div>
                        <div class="div-block-7">
                            <div id="w-node-fa5280ac-07b0-1143-1ffe-64be91ef1f7c-58d34ade" class="text-block-4">
                                <?php if($residental_total>3): ?>
                                    <?php if($perPage<7): ?>
                                    <a href="javascript:void(0);" wire:click="more_residental_heaters()">VIEW MORE</a>
                                    <?php else: ?>
                                    <a href="javascript:void(0);" wire:click="refresh()">RESET</a>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="div-block-9">
                        <div class="w-layout-grid grid-11">
                            <?php if(!empty($residental_heaters)): ?>
                                <?php $__currentLoopData = $residental_heaters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $residental_heater): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if(isset($residental_heater->name)): ?>
                                        <a href="javascript:void(0);" wire:click="heater_series('<?php echo e($residental_heater->id); ?>')">
                                            <div>
                                                <img src="<?php echo e(Storage::url($residental_heater->thumbnail_store_path)); ?>" loading="lazy" sizes="100vw" alt=""
                                                    class="image-8" onerror="this.src='<?php echo e(asset('images/nrcr.jpg')); ?>'">
                                                <div>
                                                    <h4 class="tnames"><?php echo e($residental_heater->name); ?></h4>
                                                </div>
                                            </div>
                                        </a>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if(!empty($commercial_heaters) && count($commercial_heaters)>0): ?>
                    <div class="div-block-6">
                        <div id="w-node-_33e54f9c-9828-b2ca-23cf-41231f986e4c-58d34ade" class="res">
                        <h2 class="heading-12">Commercial</h2>
                        </div>
                        <div class="div-block-7">
                        <div id="w-node-_33e54f9c-9828-b2ca-23cf-41231f986e50-58d34ade" class="text-block-4">
                            <?php if($commercial_total>3): ?>
                                <?php if($perPage<7): ?>
                            <a href="javascript:void(0);" wire:click="more_commercial_heaters()">
                                VIEW MORE</a>
                                <?php else: ?>
                                <a href="javascript:void(0);" wire:click="refresh()">RESET</a>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>
                        </div>
                    </div>
                    <div class="div-block-9">
                        <div class="w-layout-grid grid-11">
                            <?php if(!empty($commercial_heaters)): ?>
                            <?php $__currentLoopData = $commercial_heaters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $commercial_heater): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(isset($commercial_heater->name)): ?>
                               <a href="javascript:void(0);" wire:click="heater_series('<?php echo e($commercial_heater->id); ?>')">
                            <div>
                                <img src="<?php echo e(Storage::url($commercial_heater->thumbnail_store_path)); ?>" loading="lazy" sizes="100vw" alt="" class="image-8" onerror="this.src='<?php echo e(asset('images/nrcr.jpg')); ?>'">
                                <div>
                                    <h5 class="tnames"><?php echo e($commercial_heater->name); ?></h5>
                                </div>
                            </div>
                                </a>
                            <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endif; ?>

        <?php else: ?>

        <div class="div-block-6">
            <div id="w-node-_20de7921-7567-cdd1-2c33-64433101adfb-58d34ade" class="res">
                <h2 class="heading-12">Search Results</h2>
            </div>
            <div class="div-block-7">
                <div id="w-node-fa5280ac-07b0-1143-1ffe-64be91ef1f7c-58d34ade" class="text-block-4">
                    <a href="javascript:void(0);" wire:click="filter_refresh()">RESET</a>
                </div>
            </div>
        </div>
        <div class="div-block-9">
            <?php if(!empty($search_heaters) && count($search_heaters)>0): ?>
            <div class="w-layout-grid grid-11">

                    <?php $__currentLoopData = $search_heaters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $search_heater): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $__currentLoopData = $search_heater->heaters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $heater): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="<?php echo e($ifremUrl); ?>/products/<?php echo e($heater->model_no); ?>.html" target="_parent">
                        <div>
                            <img src="<?php echo e(Storage::url($heater->series_image)); ?>" loading="lazy" sizes="100vw" alt=""
                                class="image-8" onerror="this.src='<?php echo e(asset('images/nrcr.jpg')); ?>'">
                            <div>
                                <h4 class="tnames"><?php echo e($heater->model_no); ?></h4>
                            </div>
                        </div>
                         </a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <?php else: ?>
            <strong class="no_products">No products were found matching your selection. </strong>
            <?php endif; ?>
        </div>


        <?php endif; ?>

        <?php if((!empty($commercial_heaters) && count($commercial_heaters)>0 && $perPage>3) || (!empty($residental_heaters) && count($residental_heaters)>0 && $perPage>3)): ?>
        <div wire:loading style="width:100%;">
            <div id="loader">
                <div class="nb-spinner"></div>
            </div>
        </div>

        <?php endif; ?>
    </div>


    <?php if((!empty($commercial_heaters) && count($commercial_heaters)>0  && $perPage>3) || (!empty($residental_heaters) && count($residental_heaters)>0 && $perPage>3)): ?>
    <script>
        window.onscroll = function(ev) {
            if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
                console.log(window.innerHeight + window.scrollY);
                setTimeout( function(){
                   window.livewire.emit('load-more');
                }  , 1500 );
            }
        };
    </script>
    <?php endif; ?>

    <div wire:loading style="width:100%;">
        <div id="filter_loader">
            <div class="filter-spinner"></div>
        </div>
    </div>

     

</div>


<style>
#loader {
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 999;
    margin-top: 60px;
}
.nb-spinner {
	width: 75px;
	height: 75px;
	margin: 0;
	background: transparent;
	border-top: 4px solid #cf4d4d;
	border-right: 4px solid transparent;
	border-radius: 50%;
	-webkit-animation: 1s spin linear infinite;
	animation: 1s spin linear infinite;
}
#filter_loader {
    position: fixed;
    display: flex;
    justify-content: center;
    align-items: center;
    top: 0;
    right: 0;
    left: 0;
    bottom: 0;
    z-index: 999;
    background: #ffffffb5;
}
.filter-spinner {
	width: 75px;
	height: 75px;
	margin: 0;
	background: transparent;
    border-top: 4px solid #cf4d4d;
	border-right: 4px solid transparent;
	border-radius: 50%;
	-webkit-animation: 1s spin linear infinite;
	animation: 1s spin linear infinite;
}

.tnames {
    color: #000;
}
.tnames:hover {
    color: #ff5959;
}
strong.no_products {
    font-size: 18px;
    color: #ff5959;
    max-width: 87%;
    display: block;
}
</style>
<?php /**PATH C:\xampp\htdocs\noritz-laravel-backend\resources\views/domain/website/products/livewire/products.blade.php ENDPATH**/ ?>