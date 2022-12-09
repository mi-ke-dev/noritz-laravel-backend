<div>
    <div class="heatersection wf-section">
        <div class="w-layout-grid grid-5">
            <div  class="heaterblock">
                <img src="{{($heater->marketing_image)?Storage::url($heater->marketing_image):''}}" loading="lazy" sizes="(max-width: 479px) 89vw, (max-width: 991px) 37vw, 70vw"  alt="" class="heaterhero" onerror="this.src='{{asset('images/nrcr.jpg')}}'">
            </div>
            <div id="w-node-_8aee04b4-629e-c070-d843-6fcfbbec2817-e86983d1" class="heaterinfo">
                <h1 class="heading-2">{{$heater->marketing_name}}<br>{{isset($heater->heaterSeries->category)?$heater->heaterSeries->category:''}}</h1>
                @if(isset($heater->heaterSeries->heaters) && count($heater->heaterSeries->heaters))
                <p class="paragraph-3">
                    <strong class="bold-text-2">
                        @foreach($heater->heaterSeries->heaters as $key=>$similar_heater)
                        @if(isset($key) && $key>0)
                            |
                        @endif
                        <a href="javascript:void(0);" wire:click="product_detail({{$similar_heater->id}})">
                        {{$similar_heater->model_no}}
                        </a>
                        @endforeach
                    </strong>
                </p>
                @endif
                <p class="heaterdesc">{{isset($heater->heaterSeries->description)?$heater->heaterSeries->description:''}}</p>
                <div class="div-block-2">
                <h1 class="h2">FIND AN INSTALLER</h1>
                <div class="w-form">
                    <form id="email-form" name="email-form" data-name="Email Form" method="get" class="form">
                        <input type="text" class="text-field w-input" autofocus="true" maxlength="256" name="Zip-Code" data-name="Zip Code" placeholder="Enter Zip/Postal Code" id="Zip-Code">
                        <input type="submit" value="search" data-wait="Please wait..." class="submit-button w-button">
                    </form>
                    <div class="w-form-done">
                    <div>Thank you! Your submission has been received!</div>
                    </div>
                    <div class="w-form-fail">
                    <div>Oops! Something went wrong while submitting the form.</div>
                    </div>
                </div>
                </div>
                <div class="contractorloc">
                <div class="installerdiv">
                    <h4 class="heading-4">Water Heater Man</h4>
                    <div class="text-block">1361 N Hundley St, <br>Anaheim, CA 92806, USA</div>
                </div>
                <div class="installerdiv">
                    <h4 class="heading-4">Tankless Water Heater Repair &amp; Plumbing</h4>
                    <div>10040 Placer St, <br>Rancho Cucamonga, CA 91730, USA</div>
                </div>
                <div class="installerdiv">
                    <h4 class="heading-4">Tankless Water Heater Repair &amp; Plumbing</h4>
                    <div>10040 Placer St, <br>Rancho Cucamonga, CA 91730, USA</div>
                </div>
                </div>
            </div>
        </div>
    </div>

    @if($heater->feature_highlights)
    <div class="featuresection wf-section">
        <div class="w-layout-grid ftgrid">
            @foreach($heater->feature_highlights as $feature_highlight)
            <div class="helpblock">
                <img src="{{Storage::url($feature_highlight->icon_svg)}}"  loading="lazy" alt="" class="iconimage" onerror="this.src='{{asset('images/HE_icon.png')}}'" >
                <div class="icontext">{!! $feature_highlight->highlight !!}</div>
            </div>
            @endforeach

        </div>
    </div>
    @endif

  <div class="section wf-section">
    <div class="w-layout-grid grid-7">
      <div  class="div-block-3">
          <img src="{{($heater->heaterSeries->lifestyle_photo)?Storage::url($heater->heaterSeries->lifestyle_photo):''}}" loading="lazy" sizes="(max-width: 479px) 100vw, (max-width: 767px) 66vw, 600px"  onerror="this.src='{{asset('images/recircmodel.jpg')}}'" class="image-3">
        </div>
      <div  class="div-block-4">
        {{isset($heater->heaterSeries->lifestyle_photo_description)?$heater->heaterSeries->lifestyle_photo_description:''}}
        {{-- <h1>Always Hot</h1>
        <p>No more waiting for hot water. The Noritz NRCR can provide you with faster hot water wherever and whenever you need it. It does this by recirculating the water through your plumbing system, so hot water is always available in whatever part of the house that you may need it. The best part is, Noritz can provide this solution regardless of your current plumbing configuration.</p> --}}

      </div>
    </div>
  </div>
  <div class="section-2 wf-section">
       @if(isset($heater->feature_specs) && count($heater->feature_specs)>0)
        <div class="w-layout-grid grid-6">
            @foreach($heater->feature_specs as $key=>$feature_specs)
                <div class="specblocks {{(($key+1)%2==0)?'sright':''}}">
                    <h1 class="heading-5">{{$feature_specs->highlight}}</h1>
                </div>
            @endforeach
            <div class="div-block-5"></div>
            <a href="#" class="button-3 w-button">Tech Specs</a>
        </div>
        @endif
    <div class="w-layout-grid helpgrid">
      <div class="helpblock">
        <h4 class="helpblockh">Documentation</h4>
        <img src="{{asset('images/docs.png')}}" loading="lazy" alt="" class="iconimage">
        <div class="buttondiv">
          <a href="#" class="helpbut w-button">Learn More</a>
        </div>
      </div>
      <div class="helpblock">
        <h4 class="helpblockh">Find a Servicer</h4>
        <img src="{{asset('images/service.png')}}" loading="lazy" alt="" class="iconimage">
        <div class="buttondiv">
          <a href="#" class="helpbut w-button">Learn More</a>
        </div>
      </div>
      <div class="helpblock">
        <h4 class="helpblockh comp">Compare Models</h4>
        <img src="{{asset('images/compheater.png')}}" loading="lazy" width="135" alt="" class="iconimage">
        <div class="buttondiv comp">
          <a href="#" class="helpbut w-button">Learn More</a>
        </div>
      </div>
      <div class="helpblock">
        <h4 class="helpblockh">Register a Warranty</h4>
        <img src="{{asset('images/warranty.png')}}" loading="lazy" alt="" class="iconimage">
        <div class="buttondiv">
          <a href="#" class="helpbut w-button">Learn More</a>
        </div>
      </div>
    </div>
  </div>

</div>

