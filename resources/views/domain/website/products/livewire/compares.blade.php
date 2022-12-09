<?php //dd($heater_detail->feature_highlights);
// $feature_category_array = array();
// $spec_category_array = array();
?>
<section class="compare_product">
	<div class="w-container">
		<div class="w-row">
			<div class="w-col w-col-12 text-center">
				<h2 class="heading-12">Compare Noritz Tankless Water Heaters</h2>
				<p>Offering a wide selection of models for various applications, we have the perfect tankless for any install scenario.</p>
			</div>
		</div>

		<div class="loader_bg" wire:loading>
			<div class="loading"></div>
		</div>

		<div class="priduct_title">
			<div class="w-row flex">
				<div class="w-col w-col-4 border">
					<div class="w-full relative max-w-231 mr-2 mb-6">
						<select wire:model="heater_id" name="heater_id" id="heater_id" name="heater_id" class="heater_id block w-full h-14 pl-4 
							pr-16 py-2 text-gray-600 
							uppercase focus:outline-none focus:ring-0 rounded-full 
							appearance-none cursor-pointer text-sm text-left font-light 
							tracking-widest pro_selection">
							<option value="">Choose Heater </option>
							@if($heaters && count($heaters) > 0)
							@foreach($heaters as $heater)
							<option value="{{$heater->model_no}}">{{str_replace('-NG','',$heater->model_no)}} </option>
							@endforeach
							@endif
						</select>
						<i class="bg-white fas fa-chevron-down absolute text-2xl text-gray top-2.5 right-0 w-14 h-7 flex justify-center items-center pointer-events-none border-l border-gray-400 mr-2 ml-2"></i>
					</div>
					@if($heater_detail)
					
					@if($heater_detail->series_image != null)
					<img src="{{Storage::url($heater_detail->series_image)}}" loading="lazy" sizes="100vw" class="image-8"  onerror="this.src='<?php echo e(asset('images/nrcr.jpg')); ?>'">
					@else
					<img src="{{asset('images/nrcr.jpg')}}" loading="lazy" sizes="100vw" class="image-8" >
					@endif
					<?php $pos =  strpos($heater_detail->model_no, 'GQ');?>
					 @if($heater_detail->model_no && $pos == 0)
					 	<?php $posSecond = strpos($heater_detail->model_no, "(" );?>
					 	@if($posSecond > 0)
						 	<?php
								$str = explode(' (',$heater_detail->model_no);
							?>
							<h2 class="tnames">{{str_replace(')','',$str[1])}}</h2>
							<h6 class="tnames">{{$str[0]}}</h6>	 
						@else
						<h4 class="tnames">{{$heater_detail->model_no}} </h4>
						@endif
					 @else
					 	<h4 class="tnames"> {{$heater_detail->model_no}}</h4>
					 @endif

					
					@endif
				</div>
				@if($is_active_second_heater === false)
					<div class="add_more">
						<button type="submit" wire:click="updateIsActiveSecondheater({{ $is_active_second_heater }})">+</button>
					</div>
					@endif
					@if($is_active_second_heater === true)
						<div class="w-col w-col-4 border">
							<div class="w-full relative max-w-231 mr-2 mb-6">
								<select wire:model="heater_id_second" name="heater_id_second" id="heater_id_second" name="heater_id_second" class="heater_id_second block w-full h-14 pl-4 
										pr-16 py-2 text-gray-600 
										uppercase focus:outline-none focus:ring-0 rounded-full 
										appearance-none cursor-pointer text-sm text-left font-light 
										tracking-widest pro_selection">
									<option value="">Choose Heater </option>
									@if($heaters && count($heaters) > 0)
									@foreach($heaters as $heater)
									<option value="{{$heater->model_no}}">{{str_replace('-NG','',$heater->model_no)}} </option>
									@endforeach
									@endif
								</select>
								<i class="bg-white fas fa-chevron-down absolute text-2xl text-gray top-2.5 right-0 w-14 h-7 flex justify-center items-center pointer-events-none border-l border-gray-400 mr-2 ml-2"></i>
							</div>
							@if($heater_detail_second)
							<button class="delete_product" wire:click = "deleteHeater2()">X</button>
							@if($heater_detail_second->series_image != null)
							<img src="{{Storage::url($heater_detail_second->series_image)}}" loading="lazy" sizes="100vw" class="image-8" onerror="this.src='<?php echo e(asset('images/nrcr.jpg')); ?>'">
							@else
							<img src="{{asset('images/nrcr.jpg')}}" loading="lazy" sizes="100vw" class="image-8" >
							@endif

							<?php $pos =  strpos($heater_detail_second->model_no, 'GQ');?>
							@if($heater_detail_second->model_no && $pos == 0)
								<?php $posSecond = strpos($heater_detail_second->model_no, "(" );?>
								@if($posSecond > 0)
									<?php
										$str = explode(' (',$heater_detail_second->model_no);
									?>
									<h2 class="tnames">{{str_replace(')','',$str[1])}}</h2>
									<h6 class="tnames">{{$str[0]}}</h6>	 
								@else
								<h4 class="tnames">{{$heater_detail_second->model_no}}</h4>
								@endif
							@else
								<h4 class="tnames">{{$heater_detail_second->model_no}}</h4>
							@endif
							
							@endif
						</div>
					@endif
					@if($is_active_second_heater === true && $is_active_third_heater === false)
						<div class="add_more add_more_two">
							<button id="add_more_two" type="submit" wire:click="updateIsActiveThirdHeater({{ $is_active_third_heater }})">+</button>
						</div>
					@endif
					@if($is_active_second_heater === true && $is_active_third_heater === true)
					<div class="w-col w-col-4 border">
						<div class="w-full relative max-w-231 mr-2 mb-6">
							<select wire:model="heater_id_third" name="heater_id_third" id="heater_id_third" name="heater_id_third" class="heater_id_third block w-full h-14 pl-4 
									pr-16 py-2 text-gray-600 
									uppercase focus:outline-none focus:ring-0 rounded-full 
									appearance-none cursor-pointer text-sm text-left font-light 
									tracking-widest pro_selection">
								<option value="">Choose Heater </option>
								@if($heaters && count($heaters) > 0)
								@foreach($heaters as $heater)
								<option value="{{$heater->model_no}}">{{str_replace('-NG','',$heater->model_no)}} </option>
								@endforeach
								@endif
							</select>
							<i class="bg-white fas fa-chevron-down absolute text-2xl text-gray top-2.5 right-0 w-14 h-7 flex justify-center items-center pointer-events-none border-l border-gray-400 mr-2 ml-2"></i>
						</div>
						@if($heater_detail_third )
						<button class="delete_product" wire:click = "deleteHeater3()">X</button>
							@if($heater_detail_third->series_image != null)
							<img src="{{Storage::url($heater_detail_third->series_image)}}" loading="lazy" sizes="100vw" class="image-8" onerror="this.src='<?php echo e(asset('images/nrcr.jpg')); ?>'">
							@else
							<img src="{{asset('images/nrcr.jpg')}}" loading="lazy" sizes="100vw" class="image-8" >
							@endif

							<?php $pos =  strpos($heater_detail_third->model_no, 'GQ');?>
							@if($heater_detail_third->model_no && $pos == 0)
								<?php $posSecond = strpos($heater_detail_third->model_no, "(" );?>
								@if($posSecond > 0)
									<?php
										$str = explode(' (',$heater_detail_third->model_no);
									?>
									<h2 class="tnames">{{str_replace(')','',$str[1])}}</h2>
									<h6 class="tnames">{{$str[0]}}</h6>	 
								@else
								<h4 class="tnames">{{$heater_detail_third->model_no}}</h4>
								@endif
							@else
								<h4 class="tnames">{{$heater_detail_third->model_no}}</h4>
							@endif
						@endif
					</div>
				@endif
			</div>
		</div>

		<div class="section_title">
			<div class="w-col w-col-12">
				<h2 class="heading-12">Overview</h2>
			</div>
		</div>

		<div class="priduct_info">
			<div class="w-row flex">
			@if($heater_detail)
				<div class="w-col w-col-4 border">
					

					<h2>
								@if ($heater_detail && $heater_detail->max_flow_rate && $heater_detail->max_flow_rate != 'NULL')
									{{$heater_detail->max_flow_rate}}
								@else -
								@endif
							</h2>
							<p>Gallons per Minute</p>
							<h2>
								@if ($heater_detail && $heater_detail->min_gas_input_btu && $heater_detail->min_gas_input_btu != 'NULL')
								{{$heater_detail->min_gas_input_btu}} - {{$heater_detail->max_gas_input_btu}}
								@else -
								@endif
							</h2>
							<p>BTU Input Range</p>
							<h2>
								@if ($heater_detail && $heater_detail->energy_factor && $heater_detail->energy_factor != 'NULL')
								{{$heater_detail->energy_factor}}
								@else -
								@endif
								
							</h2>
							<p>Uniform Energy Factor</p>

							<h2>
							@if ($heater_detail_third && $heater_detail_third->recirculation_l1 && $heater_detail_third->recirculation_l1 != 'NULL')
							{{$heater_detail_third->recirculation_l1}} - {{$heater_detail_third->recirculation_l2}}
							@else -
							@endif							
						</h2>
						<p>Recirculation Length</p>
							<h2>
								@if ($heater_detail && $heater_detail->weight_lbs && $heater_detail->weight_lbs != 'NULL')
									{{$heater_detail->weight_lbs}}
								@else -
								@endif
							</h2>
							<p>Unit Weight</p>

							<h2>
								@if ($heater_detail && $heater_detail->width_in && $heater_detail->width_in != 'NULL')
									{{$heater_detail->width_in}} X {{$heater_detail->height_in}}
								@else -
								@endif								
							</h2>
							<p>Unit Dimensions</p>

							<h2>
								@if ($heater_detail && $heater_detail->temperature_range && $heater_detail->temperature_range != 'NULL')
								{{$heater_detail->temperature_range}}
								@else -
								@endif								
							</h2>
							<p>Temperature Range</p>

							@if($feature_category_array)
								<div class="featuresection wf-section">
									<div class="w-layout-grid ftgrid">
										@foreach($feature_category_array as $j=>$category) 
												@if($data = $heater_detail->feature_highlights->where('category',$category)->first())
													<div class="helpblock">
														<img src="{{Storage::url($data->icon_svg)}}" loading="lazy" alt="" class="iconimage" onerror="this.src='{{asset('images/HE_icon.png')}}'">
														<div class="icontext">{!! $data->highlight !!}</div>
													</div>
												@else
												<div class="helpblock">
													<div class="blankiconimage">&nbsp;</div>
													<div class="icontext">{{ $feature_category_array_data[$category] }}</div>
												</div>
												@endif 
										@endforeach
									</div>
								</div>
							@endif


							@if(count($spec_category_array) > 0)
								<div class="w-layout-grid">
								@foreach($spec_category_array as $j=>$category)
									@if($heater_detail->feature_specs)
										@if($data = $heater_detail->feature_specs->where('category',$category)->first())
											<div class="specblocks">
												<h1 class="heading-5">{{$data->highlight}}</h1>
											</div>
											@else
											<div class="specblocks">
												<h1 class="heading-5">{{ $spec_category_array_data[$category] }}</h1>
											</div>
										@endif
									@endif

								@endforeach
								</div>
							@endif

					 
					<!-- <h2>
						<img src="/images/warranty-icon.png" alt=""></h2>
						<p>Lorem Ipsum is simply</p>
						<h3>200 feet (1/2")<br>500 feet (3/4")</h3>
						<p>Lorem Ipsum is simply</p>
						<h3>73 lbs.</h3>
						<p>Lorem Ipsum is simply</p> -->
				</div>
				@endif
				@if($is_active_second_heater === true && $heater_detail_second)
					<div class="w-col w-col-4 border">
							<h2>
								@if ($heater_detail_second && $heater_detail_second->max_flow_rate && $heater_detail_second->max_flow_rate != 'NULL')
									{{$heater_detail_second->max_flow_rate}}
								@else -
								@endif
							</h2>
							<p>Gallons per Minute</p>
							<h2>
								@if ($heater_detail_second && $heater_detail_second->min_gas_input_btu && $heater_detail_second->min_gas_input_btu != 'NULL')
								{{$heater_detail_second->min_gas_input_btu}} - {{$heater_detail_second->max_gas_input_btu}}
								@else -
								@endif
							</h2>
							<p>BTU Input Range</p>
							<h2>
								@if ($heater_detail_second && $heater_detail_second->energy_factor && $heater_detail_second->energy_factor != 'NULL')
								{{$heater_detail_second->energy_factor}}
								@else -
								@endif								
							</h2>
							<p>Uniform Energy Factor</p>
							<h2>
							@if ($heater_detail_third && $heater_detail_third->recirculation_l1 && $heater_detail_third->recirculation_l1 != 'NULL')
							{{$heater_detail_third->recirculation_l1}} - {{$heater_detail_third->recirculation_l2}}
							@else -
							@endif							
						</h2>
						<p>Recirculation Length</p>

							<h2>
								@if ($heater_detail_second && $heater_detail_second->weight_lbs && $heater_detail_second->weight_lbs != 'NULL')
									{{$heater_detail_second->weight_lbs}}
								@else -
								@endif
							</h2>
							<p>Unit Weight</p>

							<h2>
								@if ($heater_detail_second && $heater_detail_second->width_in && $heater_detail_second->width_in != 'NULL')
									{{$heater_detail_second->width_in}} X {{$heater_detail_second->height_in}} X {{ $heater_detail_second->depth_in}}
								@else -
								@endif								
							</h2>
							<p>Unit Dimensions</p>

							<h2>
								@if ($heater_detail_second && $heater_detail_second->temperature_range && $heater_detail_second->temperature_range != 'NULL')
								{{ $heater_detail_second->temperature_range}}
								@else -
								@endif								
							</h2>
							<p>Temperature Range</p>
							@if($feature_category_array)
								<div class="featuresection wf-section">
									<div class="w-layout-grid ftgrid">
										@foreach($feature_category_array as $j=>$category)
											@if($heater_detail_second->feature_highlights)
												@if($data = $heater_detail_second->feature_highlights->where('category',$category)->first())
													<div class="helpblock">
														<img src="{{Storage::url($data->icon_svg)}}" loading="lazy" alt="" class="iconimage" onerror="this.src='{{asset('images/HE_icon.png')}}'">
														<div class="icontext">{!! $data->highlight !!}</div>
													</div>
												@else
												<div class="helpblock">
													<div class="blankiconimage">&nbsp;</div>
													<div class="icontext">{{ $feature_category_array_data[$category] }}</div>
												</div>
												@endif
											@endif
										@endforeach
									</div>
								</div>
							@endif

							@if(count($spec_category_array) > 0)
								<div class="w-layout-grid">
								@foreach($spec_category_array as $j=>$category)
									@if($heater_detail_second->feature_specs)
										@if($data = $heater_detail_second->feature_specs->where('category',$category)->first())
											<div class="specblocks">
												<h1 class="heading-5">{{$data->highlight}}</h1>
											</div>
											@else
											<div class="specblocks">
												<h1 class="heading-5">{{ $spec_category_array_data[$category] }}</h1>
											</div>
										@endif
									@endif

								@endforeach
								</div>
							@endif
							 				
					</div>
				
				@endif

				@if($is_active_third_heater === true && $heater_detail_third)
					<div class="w-col w-col-4 border">
						<h2>
							@if ($heater_detail_third && $heater_detail_third->max_flow_rate && $heater_detail_third->max_flow_rate != 'NULL')
								{{$heater_detail_third->max_flow_rate}}
							@else -
							@endif
						</h2>
						<p>Gallons per Minute</p>
						<h2>
							@if ($heater_detail_third && $heater_detail_third->min_gas_input_btu && $heater_detail_third->min_gas_input_btu != 'NULL')
							{{$heater_detail_third->min_gas_input_btu}} - {{$heater_detail_third->max_gas_input_btu}}
							@else -
							@endif
						</h2>
						<p>BTU Input Range</p>
						<h2>
							@if ($heater_detail_third && $heater_detail_third->energy_factor && $heater_detail_third->energy_factor != 'NULL')
							{{$heater_detail_third->energy_factor}}
							@else -
							@endif							
						</h2>
						<p>Uniform Energy Factor</p>

						<h2>
							@if ($heater_detail_third && $heater_detail_third->recirculation_l1 && $heater_detail_third->recirculation_l1 != 'NULL')
							{{$heater_detail_third->recirculation_l1}} - {{$heater_detail_third->recirculation_l2}}
							@else -
							@endif							
						</h2>
						<p>Recirculation Length</p>


						<h2>
							@if ($heater_detail_third && $heater_detail_third->weight_lbs && $heater_detail_third->weight_lbs != 'NULL')
								{{$heater_detail_third->weight_lbs}}
							@else -
							@endif
						</h2>
						<p>Unit Weight</p>

						<h2>
							@if ($heater_detail_third && $heater_detail_third->width_in && $heater_detail_third->width_in != 'NULL')
								{{$heater_detail_third->width_in}} X {{$heater_detail_third->height_in}}
							@else -
							@endif							
						</h2>
						<p>Unit Dimensions</p>

						<h2>
							@if ($heater_detail_third && $heater_detail_third->temperature_range && $heater_detail_third->temperature_range != 'NULL')
							{{$heater_detail_third->temperature_range}}
							@else -
							@endif							
						</h2>
						<p>Temperature Range</p>

						@if($feature_category_array)
							<div class="featuresection wf-section">
								<div class="w-layout-grid ftgrid">
									@foreach($feature_category_array as $j=>$category)
										@if($heater_detail_third->feature_highlights)
											@if($data = $heater_detail_third->feature_highlights->where('category',$category)->first())
												<div class="helpblock">
													<img src="{{Storage::url($data->icon_svg)}}" loading="lazy" alt="" class="iconimage" onerror="this.src='{{asset('images/HE_icon.png')}}'">
													<div class="icontext">{!! $data->highlight !!}</div>
												</div>
											@else
											<div class="helpblock">
												<div class="blankiconimage">&nbsp;</div>
												<div class="icontext">{{ $feature_category_array_data[$category] }}</div>
											</div>
											@endif
										@endif
									@endforeach
								</div>
							</div>
						@endif


						@if(count($spec_category_array) > 0)
								<div class="w-layout-grid">
								@foreach($spec_category_array as $j=>$category)
									@if($heater_detail_third->feature_specs)
										@if($data = $heater_detail_third->feature_specs->where('category',$category)->first())
											<div class="specblocks">
												<h1 class="heading-5">{{$data->highlight}}</h1>
											</div>
											@else
											<div class="specblocks">
												<h1 class="heading-5">{{ $spec_category_array_data[$category] }}</h1>
											</div>
										@endif
									@endif

								@endforeach
								</div>
							@endif

						 		
					</div>
				@endif
			</div>
		</div>
	</div>
</section>

<script>
    window.addEventListener('contentChanged', (e) => {  
		parent.window.postMessage(e.detail.item , '*');
		setTimeout(function(){ 	updateSelectDropDown(); }, 5000);
	 });
</script>
<script>

	$(document).ready(function () {
		updateSelectDropDown();	
	});

	$(document).on("click", ".add_more button", function () {
		setTimeout(function(){ 	updateSelectDropDown(); }, 5000);
	})

	function updateSelectDropDown(){
		$('.pro_selection').select2();
		$('#heater_id').on('change', function (e) {
			var item = $('#heater_id').select2("val");
			@this.set('heater_id', item);
		});
		$('#heater_id_third').on('change', function (e) {
			var item = $('#heater_id_third').select2("val");
			@this.set('heater_id_third', item);
		});
		$('#heater_id_second').on('change', function (e) {
			var item = $('#heater_id_second').select2("val");
			@this.set('heater_id_second', item);
		});

		var htr1_id = "<?php echo $heater_id;?>";
		var htr2_id = "<?php echo $heater_id_second;?>";
		var htr3_id = "<?php echo $heater_id_third;?>";

		if(htr1_id){
			$('#heater_id').val([htr1_id]).select2();
		}
		if(htr2_id){
			$('#heater_id_second').val([htr2_id]).select2();
		}
		if(htr3_id){
			$('#heater_id_third').val([htr3_id]).select2();
		}	
	}
	
</script>
<style>
	.compare_product {
		padding: 80px 0;
	}

	.w-container {
		max-width: 1230px;
		padding: 0 15px;
	}

	.text-center {
		text-align: center;
	}

	.compare_product .heading-12 {
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

	.section_title {
		background: #f0f0f0;
		display: inline-block;
		width: 100%;
		margin: 40px 0 30px;
	}

	.section_title h2.heading-12 {
		margin: 10px 0;
		text-transform: none;
	}

	.priduct_title h4.tnames {
		font-size: 24px;
		border: none;
		padding: 0;
		margin: 40px auto 0;
		max-width: 100%;
	}

	.priduct_title h6.tnames {
		font-size: 18px;
		border: none;
		padding: 0;
		margin: 40px auto 0;
		max-width: 100%;
	}

	.priduct_title h2.tnames {
		font-size: 28px;
		border: none;
		padding: 0;
		margin: 40px auto 0;
		max-width: 100%;
	}

	.flex {
		display: flex;
		width: calc(100% + 20px);
		justify-content: center;
	}

	.flex .border+.border {
		border-left: 2px solid #c4c4c4;
	}

	.priduct_info {
		text-align: center;
	}

	.priduct_info p {
		font-size: 16px;
		margin-bottom: 40px;
	}

	.priduct_info h3 {
		font-family: 'Titillium Web', sans-serif;
	}
	select.pro_selection {
		width: 100%;
		max-width: 350px;
		margin: 0 auto 20px;
		display: block;
		height: 40px;
		border: 2px solid #c4c4c4;
		padding: 0 5px;
		font-size: 16px;
	}
	.priduct_title h4.tnames:empty {
		display: none;
	}
	.add_more {position: relative;left: 20px;}

	.add_more button {background: none;border: 2px solid #000;border-radius: 50%;width: 40px;height: 40px;font-size: 41px;position: absolute; margin-bottom: 20px;}

	.priduct_info .w-layout-grid.ftgrid {display: flex;justify-content: center;padding: 0;}

	.priduct_info .w-layout-grid.ftgrid .helpblock {width: 100%;max-width: 50%;padding: 30px 20px;}

	.priduct_info .w-col >.w-layout-grid {display: flex;flex-wrap: wrap;grid-row-gap: 0;grid-column-gap: 0;}

	.priduct_info .w-col>.w-layout-grid .specblocks {width: 100%;padding: 10px 15px;margin: 30px 0 0;}

	.priduct_info .w-col>.w-layout-grid .specblocks h1.heading-5 {padding: 0;margin: 0;}

	.featuresection.wf-section {
		background: transparent;
	}

	.featuresection.wf-section .w-layout-grid.ftgrid {
		background: transparent;
		width: 100%;
		flex-direction: column;
		align-items: flex-start;
	}
	.featuresection.wf-section .w-layout-grid.ftgrid .helpblock {
		max-width: 100%;
	}
	
	.featuresection.wf-section .w-layout-grid.ftgrid .helpblock .iconimage {
    max-width: 60px;
	}
	.blankiconimage{
		height: 60px;
	}


.loading {
  height: 0;
  width: 0;
  padding: 15px;
  border: 6px solid #ccc;
  border-right-color: #888;
  border-radius: 22px;
  -webkit-animation: rotate 1s infinite linear;
  /* left, top and position just for the demo! */
  position: absolute;
  left: 50%;
  top: 50%;
}
.loader_bg {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgb(255 255 255 / 80%);
    z-index: 99;
}
@-webkit-keyframes rotate {
  /* 100% keyframe for  clockwise. 
     use 0% instead for anticlockwise */
  100% {
    -webkit-transform: rotate(360deg);
  }
}

button.delete_product {position: absolute;top: 60px;right: 0;width: 30px;height: 30px;font-size: 18px;font-weight: bold;border-radius: 50%;background: #000;color: #fff;cursor: pointer;transition: all 0.35s;visibility: hidden;opacity: 0;}

.priduct_title .border:hover button.delete_product {opacity:1; visibility:visible}

.select2-container--default .select2-selection--single {
    border: 2px solid #c4c4c4;
    border-radius: 0;
    height: 40px;
}
.select2-container--default .select2-selection--single .select2-selection__rendered {
    line-height: 36px;
}
.select2-container--default .select2-selection--single .select2-selection__arrow {
    height: 36px;
}
</style>