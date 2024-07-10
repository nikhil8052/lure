@extends('front_layout.master')
@section('content')
<div class="top_section_wrap move_container">
    <div class="banner">
        <div class="banner_bg_video">
            <video class="banner_bg" width="100%" autoplay loop  muted playsinline id="vid">
                @if (isset($homecontent->bannerSec_video ) && $homecontent->bannerSec_video  != null) 
                    <source src="{{ asset('lure/images') }}/{{ $homecontent->bannerSec_video ?? 'Aura2.mp4' }}" type="video/mp4">
                @else
                    <source src="{{ asset('lure/images/Aura2.mp4') }}" type="video/mp4">
                @endif
              
            </video>
        </div>
        <div class="banner_top text-center">
            <h3 class="banner_sub_head">{{ $homecontent->bannerSec_heading  ?? 'We LURE your dreams into reality.' }}</h3>
            @if (isset($homecontent->bannerSec_logo ) && $homecontent->bannerSec_logo  != null) 
                <img src="{{ asset('lure/images') }}/{{ $homecontent->bannerSec_logo ?? 'bannerlogo.png' }}" class="lure_text move_element_large">
            @else
                <img src="{{ asset('lure/images/bannerlogo.png') }}" class="lure_text move_element_large">
            @endif
            
        </div>
    </div>
    <div class="ripple_wrapper scroll_container" >
        @if (isset($homecontent->bannerSec_bgimage ) && $homecontent->bannerSec_bgimage  != null) 
            <div class="ripple_box" style="background-image: url({{ asset('lure/images') }}/{{ $homecontent->bannerSec_bgimage ?? 'banner_water.png' }});">
        @else
            <div class="ripple_box" style="background-image: url({{ asset('lure/images/banner_water.png') }});">
        @endif
            <div class="ripple" ></div>
                <div class="scroll_dpwn_block">
                    <div class="container">
                        <div class="inner">
                            <div class="row text-center">
                                <div class="col-md-12 text_col">
                                    <div class="text_block">
                                        <p class="size26">{{ $homecontent->bannerSec_text ?? 'We are a digital talent management company and digital marketing agency based in LA, California & LV, Nevada.' }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="more_free_block" id="about_section">
                    <div class="container">
                        <div class="row more_free_row">
                            <div class="col-md-6 text_left size22">
                                <div class="more_text_div_left">
                                    @if(isset($homecontent->aboutSec_text ) && $homecontent->aboutSec_text != null)
                                        <p>{!! $homecontent->aboutSec_text !!}</p>   
                                    @else
                                        <p>Welcome to LURE, where human experience and expertise meet cutting-edge AI technology. We're not just a social media management agency; we're revolutionizing the way OnlyFans creators scale their accounts Our Mission is to empower creators.</p>
                                        <p>We understand the unique challenges and opportunities that OnlyFans presents. That's why we've harnessed the power of AI to tailor our strategies specifically for the adult content industry. Our AI-driven solutions analyze trends, optimize content, and engage with your audience like never before.</p>
                                    @endif
                                    <div class="button_wrap">
                                        <a href="#" class="cta_btn">Connect With Us</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 more_text_col">
                                <div class="more_text_div">
                                    <div class="more_free_text">
                                        @if (isset($homecontent->aboutSec_activeheading ) && $homecontent->aboutSec_activeheading != null && !empty(json_decode($homecontent->aboutSec_activeheading)))
                                            <div class="changebox">
                                                @foreach (json_decode($homecontent->aboutSec_activeheading) as $key => $value )
                                                    @if($key == 0)
                                                        <span class="pink active">{{ $value }}</span>
                                                    @else
                                                        <span class="pink">{{ $value }}</span>
                                                    @endif
                                                @endforeach
                                            </div>
                                        @else
                                            <div class="changebox">
                                                <span class="pink">More Fans </span>
                                                <span class="pink">More views </span>
                                                <span class="pink">More money </span>
                                                <span class="pink">More reach </span>
                                            </div>
                                        @endif
                                        
                                        {{ $homecontent->aboutSec_subheading ?? "With The Best OnlyFans Agency" }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>     
        </div>
        <div class="rain">
            <svg class="rain__drop" preserveAspectRatio="xMinYMin" viewBox="0 0 5 50" style="--x: 84; --y: 94; --o: 0.9112458004273698; --a: 0.7799549549560869; --d: -0.006538195747198827; --s: 0.4894156780949699">
                <path stroke="none" d="M 2.5,0 C 2.6949458,3.5392017 3.344765,20.524571 4.4494577,30.9559 5.7551357,42.666753 4.5915685,50 2.5,50 0.40843152,50 -0.75513565,42.666753 0.55054234,30.9559 1.655235,20.524571 2.3050542,3.5392017 2.5,0 Z"></path>
            </svg>
            <svg class="rain__drop" preserveAspectRatio="xMinYMin" viewBox="0 0 5 50" style="--x: 31; --y: 26; --o: 0.07820405039693346; --a: 0.5117440613170041; --d: 0.16488993365624216; --s: 0.45598994317924224">
                <path stroke="none" d="M 2.5,0 C 2.6949458,3.5392017 3.344765,20.524571 4.4494577,30.9559 5.7551357,42.666753 4.5915685,50 2.5,50 0.40843152,50 -0.75513565,42.666753 0.55054234,30.9559 1.655235,20.524571 2.3050542,3.5392017 2.5,0 Z"></path>
            </svg>
            <svg class="rain__drop" preserveAspectRatio="xMinYMin" viewBox="0 0 5 50" style="--x: 82; --y: 60; --o: 0.4202430406859228; --a: 0.9229661960169575; --d: -0.02063835176084483; --s: 0.09493720965472563">
                <path stroke="none" d="M 2.5,0 C 2.6949458,3.5392017 3.344765,20.524571 4.4494577,30.9559 5.7551357,42.666753 4.5915685,50 2.5,50 0.40843152,50 -0.75513565,42.666753 0.55054234,30.9559 1.655235,20.524571 2.3050542,3.5392017 2.5,0 Z"></path>
            </svg>
            <svg class="rain__drop" preserveAspectRatio="xMinYMin" viewBox="0 0 5 50" style="--x: 48; --y: 34; --o: 0.548849299882783; --a: 1.038360276643773; --d: -0.2774180535450932; --s: 0.5663800562365988">
                <path stroke="none" d="M 2.5,0 C 2.6949458,3.5392017 3.344765,20.524571 4.4494577,30.9559 5.7551357,42.666753 4.5915685,50 2.5,50 0.40843152,50 -0.75513565,42.666753 0.55054234,30.9559 1.655235,20.524571 2.3050542,3.5392017 2.5,0 Z"></path>
            </svg>
            <svg class="rain__drop" preserveAspectRatio="xMinYMin" viewBox="0 0 5 50" style="--x: 3; --y: 37; --o: 0.8356705588791284; --a: 0.670768573384785; --d: 0.016129132625900322; --s: 0.8919078474641513">
                <path stroke="none" d="M 2.5,0 C 2.6949458,3.5392017 3.344765,20.524571 4.4494577,30.9559 5.7551357,42.666753 4.5915685,50 2.5,50 0.40843152,50 -0.75513565,42.666753 0.55054234,30.9559 1.655235,20.524571 2.3050542,3.5392017 2.5,0 Z"></path>
            </svg>
            <svg class="rain__drop" preserveAspectRatio="xMinYMin" viewBox="0 0 5 50" style="--x: 93; --y: 39; --o: 0.5118719380905232; --a: 0.7539938275411411; --d: -0.06806261346197395; --s: 0.0198617220625541">
                <path stroke="none" d="M 2.5,0 C 2.6949458,3.5392017 3.344765,20.524571 4.4494577,30.9559 5.7551357,42.666753 4.5915685,50 2.5,50 0.40843152,50 -0.75513565,42.666753 0.55054234,30.9559 1.655235,20.524571 2.3050542,3.5392017 2.5,0 Z"></path>
            </svg>
            <svg class="rain__drop" preserveAspectRatio="xMinYMin" viewBox="0 0 5 50" style="--x: 64; --y: 51; --o: 0.4358052384463149; --a: 0.5519814378794357; --d: -0.8130363326633185; --s: 0.6705966820245455">
                <path stroke="none" d="M 2.5,0 C 2.6949458,3.5392017 3.344765,20.524571 4.4494577,30.9559 5.7551357,42.666753 4.5915685,50 2.5,50 0.40843152,50 -0.75513565,42.666753 0.55054234,30.9559 1.655235,20.524571 2.3050542,3.5392017 2.5,0 Z"></path>
            </svg>
            <svg class="rain__drop" preserveAspectRatio="xMinYMin" viewBox="0 0 5 50" style="--x: 48; --y: 31; --o: 0.1791975526261742; --a: 1.1539718930560119; --d: -0.9891613611608272; --s: 0.9198892477217357">
                <path stroke="none" d="M 2.5,0 C 2.6949458,3.5392017 3.344765,20.524571 4.4494577,30.9559 5.7551357,42.666753 4.5915685,50 2.5,50 0.40843152,50 -0.75513565,42.666753 0.55054234,30.9559 1.655235,20.524571 2.3050542,3.5392017 2.5,0 Z"></path>
            </svg>
            <svg class="rain__drop" preserveAspectRatio="xMinYMin" viewBox="0 0 5 50" style="--x: 71; --y: 27; --o: 0.24265442020883743; --a: 1.1743504801640294; --d: 0.7685628988426689; --s: 0.9107006377925397">
                <path stroke="none" d="M 2.5,0 C 2.6949458,3.5392017 3.344765,20.524571 4.4494577,30.9559 5.7551357,42.666753 4.5915685,50 2.5,50 0.40843152,50 -0.75513565,42.666753 0.55054234,30.9559 1.655235,20.524571 2.3050542,3.5392017 2.5,0 Z"></path>
            </svg>
            <svg class="rain__drop" preserveAspectRatio="xMinYMin" viewBox="0 0 5 50" style="--x: 1; --y: 43; --o: 0.965473247522556; --a: 0.6155150560435574; --d: -0.24996696903593207; --s: 0.035695130325835045">
                <path stroke="none" d="M 2.5,0 C 2.6949458,3.5392017 3.344765,20.524571 4.4494577,30.9559 5.7551357,42.666753 4.5915685,50 2.5,50 0.40843152,50 -0.75513565,42.666753 0.55054234,30.9559 1.655235,20.524571 2.3050542,3.5392017 2.5,0 Z"></path>
            </svg>
            <svg class="rain__drop" preserveAspectRatio="xMinYMin" viewBox="0 0 5 50" style="--x: 8; --y: 45; --o: 0.1812820786409215; --a: 0.89901831540029; --d: 0.30217264489014894; --s: 0.48763069341426557">
                <path stroke="none" d="M 2.5,0 C 2.6949458,3.5392017 3.344765,20.524571 4.4494577,30.9559 5.7551357,42.666753 4.5915685,50 2.5,50 0.40843152,50 -0.75513565,42.666753 0.55054234,30.9559 1.655235,20.524571 2.3050542,3.5392017 2.5,0 Z"></path>
            </svg>
            <svg class="rain__drop" preserveAspectRatio="xMinYMin" viewBox="0 0 5 50" style="--x: 82; --y: 41; --o: 0.5112697151007874; --a: 0.7000789456088223; --d: -0.374097136987972; --s: 0.8853942759101936">
                <path stroke="none" d="M 2.5,0 C 2.6949458,3.5392017 3.344765,20.524571 4.4494577,30.9559 5.7551357,42.666753 4.5915685,50 2.5,50 0.40843152,50 -0.75513565,42.666753 0.55054234,30.9559 1.655235,20.524571 2.3050542,3.5392017 2.5,0 Z"></path>
            </svg>
            <svg class="rain__drop" preserveAspectRatio="xMinYMin" viewBox="0 0 5 50" style="--x: 6; --y: 4; --o: 0.27868763859405554; --a: 0.9157391943040016; --d: 0.9489965031873715; --s: 0.7174101046933576">
                <path stroke="none" d="M 2.5,0 C 2.6949458,3.5392017 3.344765,20.524571 4.4494577,30.9559 5.7551357,42.666753 4.5915685,50 2.5,50 0.40843152,50 -0.75513565,42.666753 0.55054234,30.9559 1.655235,20.524571 2.3050542,3.5392017 2.5,0 Z"></path>
            </svg>
            <svg class="rain__drop" preserveAspectRatio="xMinYMin" viewBox="0 0 5 50" style="--x: 46; --y: 35; --o: 0.4401911929071489; --a: 0.8666574312511313; --d: -0.32691419563107615; --s: 0.22516682109269626">
                <path stroke="none" d="M 2.5,0 C 2.6949458,3.5392017 3.344765,20.524571 4.4494577,30.9559 5.7551357,42.666753 4.5915685,50 2.5,50 0.40843152,50 -0.75513565,42.666753 0.55054234,30.9559 1.655235,20.524571 2.3050542,3.5392017 2.5,0 Z"></path>
            </svg>
            <svg class="rain__drop" preserveAspectRatio="xMinYMin" viewBox="0 0 5 50" style="--x: 20; --y: 81; --o: 0.7735599440865795; --a: 0.5964058703195756; --d: 0.7853167598483064; --s: 0.5944738853800298">
                <path stroke="none" d="M 2.5,0 C 2.6949458,3.5392017 3.344765,20.524571 4.4494577,30.9559 5.7551357,42.666753 4.5915685,50 2.5,50 0.40843152,50 -0.75513565,42.666753 0.55054234,30.9559 1.655235,20.524571 2.3050542,3.5392017 2.5,0 Z"></path>
            </svg>
            <svg class="rain__drop" preserveAspectRatio="xMinYMin" viewBox="0 0 5 50" style="--x: 2; --y: 57; --o: 0.2965285618107054; --a: 1.3772604729438018; --d: 0.19523148564761295; --s: 0.6143106097191959">
                <path stroke="none" d="M 2.5,0 C 2.6949458,3.5392017 3.344765,20.524571 4.4494577,30.9559 5.7551357,42.666753 4.5915685,50 2.5,50 0.40843152,50 -0.75513565,42.666753 0.55054234,30.9559 1.655235,20.524571 2.3050542,3.5392017 2.5,0 Z"></path>
            </svg>
            <svg class="rain__drop" preserveAspectRatio="xMinYMin" viewBox="0 0 5 50" style="--x: 63; --y: 60; --o: 0.16677285140129738; --a: 1.3628494053923508; --d: 0.2682746239178653; --s: 0.818759999789324">
                <path stroke="none" d="M 2.5,0 C 2.6949458,3.5392017 3.344765,20.524571 4.4494577,30.9559 5.7551357,42.666753 4.5915685,50 2.5,50 0.40843152,50 -0.75513565,42.666753 0.55054234,30.9559 1.655235,20.524571 2.3050542,3.5392017 2.5,0 Z"></path>
            </svg>
            <svg class="rain__drop" preserveAspectRatio="xMinYMin" viewBox="0 0 5 50" style="--x: 44; --y: 86; --o: 0.2595033565600977; --a: 1.3199777965725992; --d: 0.4557874592270661; --s: 0.7197571787966879">
                <path stroke="none" d="M 2.5,0 C 2.6949458,3.5392017 3.344765,20.524571 4.4494577,30.9559 5.7551357,42.666753 4.5915685,50 2.5,50 0.40843152,50 -0.75513565,42.666753 0.55054234,30.9559 1.655235,20.524571 2.3050542,3.5392017 2.5,0 Z"></path>
            </svg>
            <svg class="rain__drop" preserveAspectRatio="xMinYMin" viewBox="0 0 5 50" style="--x: 33; --y: 78; --o: 0.60595596152949; --a: 1.0612034637201104; --d: 0.9536440972464986; --s: 0.8009046590297415">
                <path stroke="none" d="M 2.5,0 C 2.6949458,3.5392017 3.344765,20.524571 4.4494577,30.9559 5.7551357,42.666753 4.5915685,50 2.5,50 0.40843152,50 -0.75513565,42.666753 0.55054234,30.9559 1.655235,20.524571 2.3050542,3.5392017 2.5,0 Z"></path>
            </svg>
            <svg class="rain__drop" preserveAspectRatio="xMinYMin" viewBox="0 0 5 50" style="--x: 63; --y: 7; --o: 0.753458790952676; --a: 0.8628898334113648; --d: -0.34269075826866713; --s: 0.3318014574253443">
                <path stroke="none" d="M 2.5,0 C 2.6949458,3.5392017 3.344765,20.524571 4.4494577,30.9559 5.7551357,42.666753 4.5915685,50 2.5,50 0.40843152,50 -0.75513565,42.666753 0.55054234,30.9559 1.655235,20.524571 2.3050542,3.5392017 2.5,0 Z"></path>
            </svg>
            <svg class="rain__drop" preserveAspectRatio="xMinYMin" viewBox="0 0 5 50" style="--x: 22; --y: 74; --o: 0.5290458203309947; --a: 0.8412666829769528; --d: -0.044540484905674305; --s: 0.6992359897413403">
                <path stroke="none" d="M 2.5,0 C 2.6949458,3.5392017 3.344765,20.524571 4.4494577,30.9559 5.7551357,42.666753 4.5915685,50 2.5,50 0.40843152,50 -0.75513565,42.666753 0.55054234,30.9559 1.655235,20.524571 2.3050542,3.5392017 2.5,0 Z"></path>
            </svg>
            <svg class="rain__drop" preserveAspectRatio="xMinYMin" viewBox="0 0 5 50" style="--x: 15; --y: 89; --o: 0.22365593412947415; --a: 0.9160159488306086; --d: -0.4249639265639291; --s: 0.5409823252831356">
                <path stroke="none" d="M 2.5,0 C 2.6949458,3.5392017 3.344765,20.524571 4.4494577,30.9559 5.7551357,42.666753 4.5915685,50 2.5,50 0.40843152,50 -0.75513565,42.666753 0.55054234,30.9559 1.655235,20.524571 2.3050542,3.5392017 2.5,0 Z"></path>
            </svg>
            <svg class="rain__drop" preserveAspectRatio="xMinYMin" viewBox="0 0 5 50" style="--x: 3; --y: 47; --o: 0.5366293158268529; --a: 0.740043378038902; --d: 0.9270747329348255; --s: 0.9985729700329573">
                <path stroke="none" d="M 2.5,0 C 2.6949458,3.5392017 3.344765,20.524571 4.4494577,30.9559 5.7551357,42.666753 4.5915685,50 2.5,50 0.40843152,50 -0.75513565,42.666753 0.55054234,30.9559 1.655235,20.524571 2.3050542,3.5392017 2.5,0 Z"></path>
            </svg>
            <svg class="rain__drop" preserveAspectRatio="xMinYMin" viewBox="0 0 5 50" style="--x: 43; --y: 60; --o: 0.8769744731863005; --a: 0.6900433655385654; --d: 0.478874070031885; --s: 0.0739355827684538">
                <path stroke="none" d="M 2.5,0 C 2.6949458,3.5392017 3.344765,20.524571 4.4494577,30.9559 5.7551357,42.666753 4.5915685,50 2.5,50 0.40843152,50 -0.75513565,42.666753 0.55054234,30.9559 1.655235,20.524571 2.3050542,3.5392017 2.5,0 Z"></path>
            </svg>
            <svg class="rain__drop" preserveAspectRatio="xMinYMin" viewBox="0 0 5 50" style="--x: 15; --y: 22; --o: 0.8166125729919544; --a: 1.3530299896197995; --d: 0.05161703933412509; --s: 0.8102915974234577">
                <path stroke="none" d="M 2.5,0 C 2.6949458,3.5392017 3.344765,20.524571 4.4494577,30.9559 5.7551357,42.666753 4.5915685,50 2.5,50 0.40843152,50 -0.75513565,42.666753 0.55054234,30.9559 1.655235,20.524571 2.3050542,3.5392017 2.5,0 Z"></path>
            </svg>
            <svg class="rain__drop" preserveAspectRatio="xMinYMin" viewBox="0 0 5 50" style="--x: 48; --y: 18; --o: 0.3153449312525869; --a: 1.2213664985859722; --d: 0.09471616526876936; --s: 0.7640999514419975">
                <path stroke="none" d="M 2.5,0 C 2.6949458,3.5392017 3.344765,20.524571 4.4494577,30.9559 5.7551357,42.666753 4.5915685,50 2.5,50 0.40843152,50 -0.75513565,42.666753 0.55054234,30.9559 1.655235,20.524571 2.3050542,3.5392017 2.5,0 Z"></path>
            </svg>
            <svg class="rain__drop" preserveAspectRatio="xMinYMin" viewBox="0 0 5 50" style="--x: 79; --y: 89; --o: 0.38606063081636655; --a: 0.979680417595242; --d: 0.6117086022457103; --s: 0.7143932592043862">
                <path stroke="none" d="M 2.5,0 C 2.6949458,3.5392017 3.344765,20.524571 4.4494577,30.9559 5.7551357,42.666753 4.5915685,50 2.5,50 0.40843152,50 -0.75513565,42.666753 0.55054234,30.9559 1.655235,20.524571 2.3050542,3.5392017 2.5,0 Z"></path>
            </svg>
            <svg class="rain__drop" preserveAspectRatio="xMinYMin" viewBox="0 0 5 50" style="--x: 6; --y: 78; --o: 0.32310706906731745; --a: 1.1024352314174946; --d: -0.5269732586955258; --s: 0.3502886291130469">
                <path stroke="none" d="M 2.5,0 C 2.6949458,3.5392017 3.344765,20.524571 4.4494577,30.9559 5.7551357,42.666753 4.5915685,50 2.5,50 0.40843152,50 -0.75513565,42.666753 0.55054234,30.9559 1.655235,20.524571 2.3050542,3.5392017 2.5,0 Z"></path>
            </svg>
            <svg class="rain__drop" preserveAspectRatio="xMinYMin" viewBox="0 0 5 50" style="--x: 99; --y: 19; --o: 0.8634560190580516; --a: 0.5296242126056909; --d: 0.32884202947417895; --s: 0.2719766982519902">
                <path stroke="none" d="M 2.5,0 C 2.6949458,3.5392017 3.344765,20.524571 4.4494577,30.9559 5.7551357,42.666753 4.5915685,50 2.5,50 0.40843152,50 -0.75513565,42.666753 0.55054234,30.9559 1.655235,20.524571 2.3050542,3.5392017 2.5,0 Z"></path>
            </svg>
            <svg class="rain__drop" preserveAspectRatio="xMinYMin" viewBox="0 0 5 50" style="--x: 96; --y: 96; --o: 0.7947150396887501; --a: 0.8149380317389137; --d: -0.8558219581842872; --s: 0.5745616937018854">
                <path stroke="none" d="M 2.5,0 C 2.6949458,3.5392017 3.344765,20.524571 4.4494577,30.9559 5.7551357,42.666753 4.5915685,50 2.5,50 0.40843152,50 -0.75513565,42.666753 0.55054234,30.9559 1.655235,20.524571 2.3050542,3.5392017 2.5,0 Z"></path>
            </svg>
            <svg class="rain__drop" preserveAspectRatio="xMinYMin" viewBox="0 0 5 50" style="--x: 77; --y: 40; --o: 0.7226399284172829; --a: 1.362447983099958; --d: 0.8178709862705631; --s: 0.7958005666134009">
                <path stroke="none" d="M 2.5,0 C 2.6949458,3.5392017 3.344765,20.524571 4.4494577,30.9559 5.7551357,42.666753 4.5915685,50 2.5,50 0.40843152,50 -0.75513565,42.666753 0.55054234,30.9559 1.655235,20.524571 2.3050542,3.5392017 2.5,0 Z"></path>
            </svg>
            <svg class="rain__drop" preserveAspectRatio="xMinYMin" viewBox="0 0 5 50" style="--x: 75; --y: 13; --o: 0.27018173348890473; --a: 0.8805366789843594; --d: 0.5970527903857694; --s: 0.04110630206426524">
                <path stroke="none" d="M 2.5,0 C 2.6949458,3.5392017 3.344765,20.524571 4.4494577,30.9559 5.7551357,42.666753 4.5915685,50 2.5,50 0.40843152,50 -0.75513565,42.666753 0.55054234,30.9559 1.655235,20.524571 2.3050542,3.5392017 2.5,0 Z"></path>
            </svg>
            <svg class="rain__drop" preserveAspectRatio="xMinYMin" viewBox="0 0 5 50" style="--x: 27; --y: 60; --o: 0.5503034982320518; --a: 1.0251514406267328; --d: 0.536014033528736; --s: 0.2749917528303025">
                <path stroke="none" d="M 2.5,0 C 2.6949458,3.5392017 3.344765,20.524571 4.4494577,30.9559 5.7551357,42.666753 4.5915685,50 2.5,50 0.40843152,50 -0.75513565,42.666753 0.55054234,30.9559 1.655235,20.524571 2.3050542,3.5392017 2.5,0 Z"></path>
            </svg>
            <svg class="rain__drop" preserveAspectRatio="xMinYMin" viewBox="0 0 5 50" style="--x: 45; --y: 51; --o: 0.12121008722001281; --a: 0.7315685335938722; --d: -0.5538983071810075; --s: 0.00036406622907003694">
                <path stroke="none" d="M 2.5,0 C 2.6949458,3.5392017 3.344765,20.524571 4.4494577,30.9559 5.7551357,42.666753 4.5915685,50 2.5,50 0.40843152,50 -0.75513565,42.666753 0.55054234,30.9559 1.655235,20.524571 2.3050542,3.5392017 2.5,0 Z"></path>
            </svg>
            <svg class="rain__drop" preserveAspectRatio="xMinYMin" viewBox="0 0 5 50" style="--x: 92; --y: 3; --o: 0.27938600017558834; --a: 1.0909782466413058; --d: -0.2318089729089392; --s: 0.4743835387908273">
                <path stroke="none" d="M 2.5,0 C 2.6949458,3.5392017 3.344765,20.524571 4.4494577,30.9559 5.7551357,42.666753 4.5915685,50 2.5,50 0.40843152,50 -0.75513565,42.666753 0.55054234,30.9559 1.655235,20.524571 2.3050542,3.5392017 2.5,0 Z"></path>
            </svg>
            <svg class="rain__drop" preserveAspectRatio="xMinYMin" viewBox="0 0 5 50" style="--x: 69; --y: 48; --o: 0.574009938435194; --a: 0.5179809231159371; --d: 0.005289814220879485; --s: 0.7933357130668621">
                <path stroke="none" d="M 2.5,0 C 2.6949458,3.5392017 3.344765,20.524571 4.4494577,30.9559 5.7551357,42.666753 4.5915685,50 2.5,50 0.40843152,50 -0.75513565,42.666753 0.55054234,30.9559 1.655235,20.524571 2.3050542,3.5392017 2.5,0 Z"></path>
            </svg>
            <svg class="rain__drop" preserveAspectRatio="xMinYMin" viewBox="0 0 5 50" style="--x: 80; --y: 9; --o: 0.060360532679377465; --a: 1.1642142218637581; --d: -0.8905964684872028; --s: 0.0015096237978253768">
                <path stroke="none" d="M 2.5,0 C 2.6949458,3.5392017 3.344765,20.524571 4.4494577,30.9559 5.7551357,42.666753 4.5915685,50 2.5,50 0.40843152,50 -0.75513565,42.666753 0.55054234,30.9559 1.655235,20.524571 2.3050542,3.5392017 2.5,0 Z"></path>
            </svg>
            <svg class="rain__drop" preserveAspectRatio="xMinYMin" viewBox="0 0 5 50" style="--x: 74; --y: 29; --o: 0.976751692105658; --a: 0.7572411232315381; --d: 0.25363137910710787; --s: 0.7776527585088173">
                <path stroke="none" d="M 2.5,0 C 2.6949458,3.5392017 3.344765,20.524571 4.4494577,30.9559 5.7551357,42.666753 4.5915685,50 2.5,50 0.40843152,50 -0.75513565,42.666753 0.55054234,30.9559 1.655235,20.524571 2.3050542,3.5392017 2.5,0 Z"></path>
            </svg>
            <svg class="rain__drop" preserveAspectRatio="xMinYMin" viewBox="0 0 5 50" style="--x: 38; --y: 35; --o: 0.5610015054925306; --a: 0.9215068510610049; --d: -0.3783558198176795; --s: 0.7716181138476355">
                <path stroke="none" d="M 2.5,0 C 2.6949458,3.5392017 3.344765,20.524571 4.4494577,30.9559 5.7551357,42.666753 4.5915685,50 2.5,50 0.40843152,50 -0.75513565,42.666753 0.55054234,30.9559 1.655235,20.524571 2.3050542,3.5392017 2.5,0 Z"></path>
            </svg>
            <svg class="rain__drop" preserveAspectRatio="xMinYMin" viewBox="0 0 5 50" style="--x: 19; --y: 75; --o: 0.7849031961006314; --a: 0.6960598500450761; --d: 0.43540103490826665; --s: 0.053817335657136756">
                <path stroke="none" d="M 2.5,0 C 2.6949458,3.5392017 3.344765,20.524571 4.4494577,30.9559 5.7551357,42.666753 4.5915685,50 2.5,50 0.40843152,50 -0.75513565,42.666753 0.55054234,30.9559 1.655235,20.524571 2.3050542,3.5392017 2.5,0 Z"></path>
            </svg>
            <svg class="rain__drop" preserveAspectRatio="xMinYMin" viewBox="0 0 5 50" style="--x: 63; --y: 42; --o: 0.5936656409000063; --a: 1.3723094638842896; --d: 0.31811091304614525; --s: 0.20338645759590324">
                <path stroke="none" d="M 2.5,0 C 2.6949458,3.5392017 3.344765,20.524571 4.4494577,30.9559 5.7551357,42.666753 4.5915685,50 2.5,50 0.40843152,50 -0.75513565,42.666753 0.55054234,30.9559 1.655235,20.524571 2.3050542,3.5392017 2.5,0 Z"></path>
            </svg>
            <svg class="rain__drop" preserveAspectRatio="xMinYMin" viewBox="0 0 5 50" style="--x: 81; --y: 42; --o: 0.8898210836182845; --a: 1.1766191874492704; --d: -0.3754262914314159; --s: 0.8825513139207799">
                <path stroke="none" d="M 2.5,0 C 2.6949458,3.5392017 3.344765,20.524571 4.4494577,30.9559 5.7551357,42.666753 4.5915685,50 2.5,50 0.40843152,50 -0.75513565,42.666753 0.55054234,30.9559 1.655235,20.524571 2.3050542,3.5392017 2.5,0 Z"></path>
            </svg>
            <svg class="rain__drop" preserveAspectRatio="xMinYMin" viewBox="0 0 5 50" style="--x: 3; --y: 69; --o: 0.004158106833437314; --a: 0.8660314003059684; --d: -0.45973608501738505; --s: 0.32589915953082826">
                <path stroke="none" d="M 2.5,0 C 2.6949458,3.5392017 3.344765,20.524571 4.4494577,30.9559 5.7551357,42.666753 4.5915685,50 2.5,50 0.40843152,50 -0.75513565,42.666753 0.55054234,30.9559 1.655235,20.524571 2.3050542,3.5392017 2.5,0 Z"></path>
            </svg>
            <svg class="rain__drop" preserveAspectRatio="xMinYMin" viewBox="0 0 5 50" style="--x: 72; --y: 88; --o: 0.21561079339921196; --a: 0.5514942228484268; --d: 0.7463083021426606; --s: 0.011818387398880636">
                <path stroke="none" d="M 2.5,0 C 2.6949458,3.5392017 3.344765,20.524571 4.4494577,30.9559 5.7551357,42.666753 4.5915685,50 2.5,50 0.40843152,50 -0.75513565,42.666753 0.55054234,30.9559 1.655235,20.524571 2.3050542,3.5392017 2.5,0 Z"></path>
            </svg>
            <svg class="rain__drop" preserveAspectRatio="xMinYMin" viewBox="0 0 5 50" style="--x: 19; --y: 9; --o: 0.7910606784666978; --a: 1.4889084250956253; --d: 0.5012562195874408; --s: 0.7218809750868052">
                <path stroke="none" d="M 2.5,0 C 2.6949458,3.5392017 3.344765,20.524571 4.4494577,30.9559 5.7551357,42.666753 4.5915685,50 2.5,50 0.40843152,50 -0.75513565,42.666753 0.55054234,30.9559 1.655235,20.524571 2.3050542,3.5392017 2.5,0 Z"></path>
            </svg>
            <svg class="rain__drop" preserveAspectRatio="xMinYMin" viewBox="0 0 5 50" style="--x: 89; --y: 26; --o: 0.0736727351936537; --a: 1.293138219953939; --d: -0.034918633927961906; --s: 0.6318668207651115">
                <path stroke="none" d="M 2.5,0 C 2.6949458,3.5392017 3.344765,20.524571 4.4494577,30.9559 5.7551357,42.666753 4.5915685,50 2.5,50 0.40843152,50 -0.75513565,42.666753 0.55054234,30.9559 1.655235,20.524571 2.3050542,3.5392017 2.5,0 Z"></path>
            </svg>
            <svg class="rain__drop" preserveAspectRatio="xMinYMin" viewBox="0 0 5 50" style="--x: 99; --y: 32; --o: 0.31044994462082753; --a: 0.6423688204734892; --d: 0.3970780017286235; --s: 0.015429923926202793">
                <path stroke="none" d="M 2.5,0 C 2.6949458,3.5392017 3.344765,20.524571 4.4494577,30.9559 5.7551357,42.666753 4.5915685,50 2.5,50 0.40843152,50 -0.75513565,42.666753 0.55054234,30.9559 1.655235,20.524571 2.3050542,3.5392017 2.5,0 Z"></path>
            </svg>
        </div>
    </div>
@if(isset($services) && $services != null)
    <section class="services horizontal_scrub_slider desktop_section" id="services_section">
        <div class="services_container">
            <div class="horizontal_flex">
                <div class="left_slide_head scroll_left">
                    <h2 class="size195">{{ $services->title ?? 'Our Services' }}</h2>
                </div>
                <div class="horizontal_slide_outer scroll_left">
                    <div class="horizontal_slide_boxes">
                        @if( $services->services != null && !empty(json_decode($services->services,true)))
                            @foreach (json_decode($services->services,true) as $data)
                                <div class="horizontal_slide_col">
                                    <div class="service_card">
                                        <div class="service_card_inner">
                                            <h3 class="pink">{{ $data['heading'] ?? '' }}</h3>
                                            <p>{!! $data['description'] ?? '' !!}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="horizontal_slide_col">
                                <div class="service_card">
                                    <div class="service_card_inner">
                                        <h3 class="pink">Content Scheduling</h3>
                                        <p>Our tailor-made content plans are meticulously crafted to suit your specific needs. By understanding the optimal timing, frequency, and content type to post, we can take your content to unprecedented levels of success.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="horizontal_slide_col">
                                <div class="service_card">
                                    <div class="service_card_inner">
                                        <h3 class="pink">Paid Advertisment</h3>
                                        <p>Our creators have the luxury of having a team that is willing to invest in their success. Our creators have access to the best promotions from top pages or creators within the space to ensure their continued growth.</p>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif

@if(isset($services) && $services != null)
    <section class="services mobile_section p100" id="services_section">
        <div class="container">
            <div class="slide_head text-center">
                <h2 class="">{{ $services->title ?? 'Our Services' }}</h2>
            </div>
            <div class="slick-btn-wrap">
                <button class="prev-btn"><img src="images/arrow_prev.svg"></button>
                <button class="next-btn"><img src="images/arrow_next.svg"></button>
            </div>
            <div class="horizontal_slide_flex mobile_services">
                @if( $services->services != null && !empty(json_decode($services->services,true)))
                    @foreach (json_decode($services->services,true) as $data)
                        <div class="horizontal_slide_col">
                            <div class="service_card">
                                <div class="service_card_inner">
                                    <h3 class="pink">{{ $data['heading'] ?? '' }}</h3>
                                    <p>{!! $data['description'] ?? '' !!}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="horizontal_slide_col">
                        <div class="service_card">
                            <div class="service_card_inner">
                                <h3 class="pink">LURE Marketing</h3>
                                <p>We market and grow your social fanbase through personalized strategies on TikTok, Twitter, and Instagram.</p>
                            </div>
                        </div>
                    </div>
                    <div class="horizontal_slide_col">
                        <div class="service_card">
                            <div class="service_card_inner">
                                <h3 class="pink">Content Support</h3>
                                <p>We assist you with creating the right content on social media platforms, to maximize your revenue potential.
                                </p>                            
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endif
<section class="agency_section p100 p-t-0">
    <div class="container">
        <div class="agency_wrap">
            <div class="agency_hedibg_col">
                <h4>Expert’s Pick: <br> {{ $homecontent->expertpicks_heading ?? 'Top Rated OnlyFans Agency' }}</h4>
            </div>
            <div class="agency_logo_col">
                <div class="agency_logo_wrapper">
                    <div class="logo_Marquees">
                        <div class="logo_Marquee">
                            @if(isset($homecontent->expertpicks_logos) && $homecontent->expertpicks_logos != null && !empty(json_decode($homecontent->expertpicks_logos)))
                                @foreach (json_decode($homecontent->expertpicks_logos,true) as $key => $logo)
                                    <div class="marquee Item"><img src="{{ asset('/lure/images') }}/{{ $logo }}"></div>
                                @endforeach
                            @else
                                <div class="marquee Item"><img src="{{ asset('lure/images/Group 62.png')}}"></div>
                                <div class="marquee Item"><img src="{{ asset('lure/images/Group 63.png')}}"></div>
                                <div class="marquee Item"><img src="{{ asset('lure/images/Group 64.png')}}"></div>
                                <div class="marquee Item"><img src="{{ asset('lure/images/Group 63.png')}}"></div>
                                <div class="marquee Item"><img src="{{ asset('lure/images/Group 62.png')}}"></div>
                                <div class="marquee Item"><img src="{{ asset('lure/images/Group 61.png')}}"></div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="influence_section p100">
    <div class="container">
        <div class="section_head text-center">
            <h2>{{ $influence_sec->heading ?? 'Expand Your Influence' }}</h2>
            <div class="header_div">
                <p>{{ $influence_sec->text ??  "Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged." }}</p>
            </div>
        </div>
        <div class="videos_compare_block">
            <div class="video_col">
                <div class="live-stream old_stream">
                    <div class="header_stream">
                        <div class="tag_live">LIVE</div><div class="viewer-counter"><i class="fa-solid fa-eye"></i> <span class="count_value" id="viewerCount_less"></span></div>
                    </div>
                    <div class="video-placeholder">
                        <div class="video_wrapper">
                            <video class="reel" width="100%" autoplay loop  muted playsinline>
                                @if(isset($influence_sec->video_before) && $influence_sec->video_before != null)
                                    <source src="{{ asset('lure/images')}}/{{ $influence_sec->video_before ?? 'SaveInsta.App - 2815084280449866245.mp4'}}" type="video/mp4">
                                @else
                                    <source src="{{ asset('lure/images/SaveInsta.App - 2815084280449866245.mp4')}}" type="video/mp4">
                                @endif
                            </video>
                        </div>
                    </div>
                    <div class="stream_footer">
                        <div class="coment">
                            <span class="coment_text">Comment</span>
                            <div class="comments_dots">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </div>
                        <div class="message">
                            <i class="fa-regular fa-paper-plane"></i>
                        </div>
                        <div class="likes">
                            <span class="like_icon"><i class="fa-regular fa-heart"></i></span>
                            <div class="heart_container animate_heart"></div>
                        </div>
                    </div>
                    <!-- <img src="images/Shot With iphone.png" class="image_with"> -->
                </div>
            </div>
            <div class="button_col">
                <div class="button_wrap_compare">
                    <a  class="cta_btn cta_gradient">Before</a>
                    <img src="{{ asset('lure/images/vs.svg')}}" class="vs_image">
                    <a  class="cta_btn cta_gradient">After</a>
                    <div class="dot_line"></div>
                </div>
            </div>
            <div class="video_col">
                <div class="live-stream new_stream">
                    <div class="header_stream">
                        <div class="tag_live">LIVE</div><div class="viewer-counter"><i class="fa-solid fa-eye"></i> <span class="count_value" id="viewerCount_more"></span></div>
                    </div>
                    <div class="video-placeholder">
                        <div class="video_wrapper video_new ">
                            <video class="reel" width="100%" autoplay loop  muted playsinline>
                                @if(isset($influence_sec->video_after) && $influence_sec->video_after != null)
                                    <source src="{{ asset('lure/images')}}/{{ $influence_sec->video_after ?? 'SaveInsta.App - 3399851741141652982.mp4'}}" type="video/mp4">
                                @else
                                    <source src="{{ asset('lure/images/SaveInsta.App - 3399851741141652982.mp4') }}" type="video/mp4">
                                @endif
                            </video>
                        </div>
                    </div>
                    <div class="stream_footer">
                        <div class="coment">
                            <span class="coment_text">Comment</span>
                            <div class="comments_dots">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </div>
                        <div class="message">
                            <i class="fa-regular fa-paper-plane"></i>
                        </div>
                        <div class="likes">
                            <span class="like_icon"><i class="fa-regular fa-heart"></i></span>
                            <div class="heart_container_more animate_heart"></div>
                        </div>
                    </div>
                    <!-- <img src="images/Shot With 4k Camera.png" class="image_with"> -->
                </div>
            </div>
        </div>
    </div> 
</section>

<section class="tabs_section p100">
    <div class="container">
        <div class="section_inner" style="background-image:url(images/gradient_section_bg.png)";>
            <div class="tabs_button">
                <button class="before_btn active">Before</button>
                <button class="after_btn" >After</button>
                <img src="images/lottie.svg" class="lotie_abs">
            </div>
            <div class="insta_inner">
                <div class="insta_card">
                    <div class="crad_inner">
                        <div class="top_bar">
                            <div class="back_icon">
                                <i class="fa-solid fa-chevron-left"></i>
                            </div>
                            <div class="profile_title">
                                <p>alyssagriffith</p>
                            </div>
                            <div class="icon_dots">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </div>
                        <div class="stats">
                            <div class="profile_image">
                                <img src="{{ asset('lure/images/elyssa.png') }}">
                            </div>
                            <div class="stats_data">
                                <div class="stats__data__point">
                                    <div class="stats__data__value">
                                        2,222
                                    </div>
                                    <div class="stats__data__description">
                                        posts
                                    </div>
                                </div>
                                <div class="stats__data__point">
                                    <div class="stats__data__value follower_value">
                                        2,313,873
                                    </div>
                                    <div class="stats__data__description">
                                        Followers
                                    </div>
                                </div>
                                <div class="stats__data__point">
                                    <div class="stats__data__value">
                                        319
                                    </div>
                                    <div class="stats__data__description">
                                        Following
                                    </div>
                                </div>
                            </div>
                        </div>
                    <div class="description">
                        <div class="decription__title">alyssa Griffith</div>
                        <div class="insta_tread"> <i class="fa-brands fa-threads"></i> alyssagriffith </div>
                        <div class="des"><a href=""> @Fashion Naova</a></div>
                        <div class="des">Twin: <a href=""> @Waifulyss</a></div>
                        <div class="des">Inquiries: <a href=""> alyssa@luregmgt.co</a></div>
                    </div>
                    <div class="actions">
                        <a href="" class="action_btn actions__btn--active">Follow</a>
                        <a href="" class="action_btn">Message</a>
                        <a href="" class="action_btn">Subscribe</a>
                        <span class="action_btn"><i class="fa-solid fa-chevron-down"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@if(isset($results) && $results != null)
    <section class="our_result_section p100 p-t-0 moving_text" id="result_section">
        <div class="result_flip_wrapper">
            <div class="flip_slider_wrap flip_slider">
                <div class="section_head moving_text_container">
                    <h2 class="moving_text_item">{{ $results->title ?? 'Some Of Our Results' }}</h2>
                </div>
                <div class="container">
                    <div class="alphaer">
                        <div class="slider_buttons">
                            <div class="button_div"><button class="alphaback btn text-white h3"><i class="fas fa-chevron-up"></i></button></div>
                            <div class="button_div"><button class="alphanext btn text-white h3"><i class="fas fa-chevron-down"></i></button></div>
                        </div>
                        <div class="alphas">
                            @if(isset($results->results) && $results->results != null  && !empty(json_decode($results->results)))
                                @foreach (json_decode($results->results,true) as $result)
                                    <div class="card alpha blog-sec">
                                        <div class="flip_slide">
                                            <div class="result_flip_box">
                                                <div class="result_flip_inner">
                                                    <div class="result_row row">
                                                        <div class="col-md-6 result_text_col">
                                                            <div class="result_text">
                                                                <h3>{{ $result['heading'] }} </h3>
                                                                <p>{!! $result['description'] !!}</p>
                                                                <div class="cta_wrap mt-10">
                                                                    <a href="{{ route('apply.now') }}" class="cta_btn cta_white_text">Apply Now</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 result_media_col">
                                                            <div class="result_image">
                                                                <img src="{{ asset('Our_result') }}/{{ $result['image'] }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="card alpha blog-sec">
                                    <div class="flip_slide">
                                        <div class="result_flip_box">
                                            <div class="result_flip_inner">
                                                <div class="result_row row">
                                                    <div class="col-md-6 result_text_col">
                                                        <div class="result_text">
                                                            <h3>Creator consulting </h3>
                                                            <p>Discover the power of a fusion between strategy, seductive texting, and top-tier marketing expertise. We delve deep to identify the forces shaping your account, unveiling opportunities that drive impressive revenue growth. Together, we'll craft a brand that truly reflects your success and vision.</p>
                                                            <div class="cta_wrap mt-10">
                                                                <a href="{{ route('apply.now') }}" class="cta_btn cta_white_text">Apply Now</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 result_media_col">
                                                        <div class="result_image">
                                                            <img src="{{ asset('lure/images/result_grph.png') }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif
<div class="divider p100">
    <div class="container-fluid text-center">
        <img src="{{ asset('lure/images/line.png') }}">
    </div>
</div>
<section class="unlash_section p-b-0">
    <div class="container">
        <div class="section_head text-center">
            <h2>Unleash Creative Mastery</h2>
        </div>
        <div class="creativity_wrap_row">
            <div class="crateive_icon_col">
                <div class="creative_icon_div">
                    <div class="cr_icon_row">
                        <div class="cr_ic_col">
                            <div class="cr_icon_box">
                                <img src="{{ asset('lure/images/SnapChatgif.gif') }}" class="">
                                <p>Snapchat</p>
                            </div>
                            <div class="cr_icon_box">
                                <img src="{{ asset('lure/images/youtube_gif.gif') }}" class="">
                                <p>Youtube</p>
                            </div>
                        </div>
                        <div class="cr_ic_col">
                            <div class="cr_icon_box">
                                <img src="{{ asset('lure/images/tindergif.gif') }}" class="">
                                <p>Tinder</p>
                            </div>
                            <div class="cr_icon_box ">
                                <img src="{{ asset('lure/images/tiktokgif.gif') }}" class="">
                                <p>TikTok</p>
                            </div>
                            <div class="cr_icon_box ">
                                <img src="{{ asset('lure/images/Redditgif.gif') }}" class="">
                                <p>Reddit</p>
                            </div>
                        </div>
                        <div class="cr_ic_col">
                            <div class="cr_icon_box">
                                <img src="{{ asset('lure/images/Twittergif.gif') }}" class="">
                                <p>Twitter</p>
                            </div>
                            <div class="cr_icon_box">
                                <img src="{{ asset('lure/images/insta-instagramgif.gif') }}" class="">
                                <p>Instagram</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="line_div_col">
                <div class="line_div">
                    <div class="lure_logo">
                        <img src="{{ asset('lure/images/Group 35307.png') }}" class="">
                    </div>
                </div>
                <svg class="animated-line" width="409" height="112" viewBox="0 0 409 112" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path class="line" d="M0.5 1.07228H22C27.1667 0.572277 37.3 2.67228 36.5 15.0723V43.0723C36 46.9056 37.4 54.8723 47 56.0723" stroke="#2C2C2C" stroke-width="1.5"/>
                    <path class="line" d="M0.5 111.072H22C27.1667 111.572 37.3 109.472 36.5 97.0723V69.0723C36 65.2389 37.4 57.2723 47 56.0723" stroke="#2C2C2C" stroke-width="1.5"/>
                    <path class="line" d="M46 56.0723H409" stroke="#2C2C2C" stroke-width="1.5"/>
                </svg>
            </div>
            <div class="crateive_media_col">
                <div class="creative_image_div move_container">
                    <div class="image_big_wrap">
                        <img src="{{ asset('lure/images/mastery_image.svg') }}" class="big_imaghe ">
                    </div>
                </div>
            </div>
            <!-- Add SVG line for animation -->
        </div>
    </div>
</section>
<div class="divider p100">
    <div class="container-fluid text-center">
        <img src="{{ asset('lure/images/line.png') }}">
    </div>
</div>
<section class="currently_sec">
<!--     <div class="bg_video">
        <video class="bg_accordion" width="100%" autoplay loop muted playsinline id="bg-vid">
            <source src="images/Aura2.mp4" type="video/mp4">
        </video>
    </div> -->
    {{-- @if(isset($testimonials) && $testimonials != null && $testimonials->isNotEmpty())
        <div class="testimonial_block">
            <div class="container">
                <div class="our_client p_100">
                    <div class="clients_wrapper">
                        <div class="our_client_head">
                            <h2>What Our clients <br>
                                say about</h2>
                        </div>
                        <div class="our_client_txt">
                            <p>Discover a world where creativity knows no bounds and your dreams take center stage.</p>
                        </div>
                    </div>
                </div>
                <div class="clients_slider">
                    @foreach($testimonials as $client)
                        <div class="client-box">
                            <div class="client_data">
                                <h5>“{!! $client->description ?? '' !!}”</h5>
                            </div>
                            <div class="client_profile">
                                <div class="client-img">
                                    <img src="{{ asset('testimonials') }}/{{ $client->image }}" alt="">
                                    <div class="name_data">
                                        <p>{{ $client->name }}</p>
                                        <span>{{ $client->position }}, {{ $client->company_name }}</span>
                                    </div>
                                </div>
                                <div class="store_wrapp">
                                    <div class="profile_img">
                                        <img src="{{ asset('lure/images/client_logo.png') }}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif --}}
        <div class="domin_block">
            <div class="container">
                <div class="dominate_content p_140">
                    @if(isset($homecontent->contentSec_simage) && $homecontent->contentSec_simage != null)
                        <img class="hot_grl" src="{{ asset('lure/images') }}/{{ $homecontent->contentSec_simage ?? 'ai-beautiful-hot-girl-png-image 1.png' }}" >
                    @else 
                        <img src="{{ asset('lure/images/ai-beautiful-hot-girl-png-image 1.png') }}" class="hot_grl">
                    @endif
                    <div class="row">
                        <div class="col-md-6">
                            <div class="dominate_head">
                                <h2 class="pink">{{ $homecontent->contentSec_heading  ?? 'Content Creation' }}</h2>
                                @if(isset($homecontent->contentSec_text) && $homecontent->contentSec_heading != null)
                                    <p>{!! $homecontent->contentSec_text !!}</p>
                                @else
                                    <p>The easiest way to take your brand and feed from casual to professional is with high
                                        quality videography and photography. In fact, videography alone can increase your
                                        engagement by nearly 35%. Our team is experienced in creative directing and stays ahead
                                        of trends to make sure you remain always at the top of your game.
                                    </p>
                                    <p> We have an extensive network of domestic and international creatives to help our clients
                                        meet all of their ideal content desires.
                                    </p>
                                @endif
                            </div>
                        </div>
    
                        <div class="col-md-6">
                            <div class="market_img">
                                @if(isset($homecontent->contentSec_image) && $homecontent->contentSec_image != null)
                                    <img src="{{ asset('lure/images') }}/{{ $homecontent->contentSec_image ?? 'market.png' }}" alt="">
                                @else 
                                    <img src="{{ asset('lure/images/market.png') }}" alt="">
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>

@if(isset($allModels) && $allModels != null && $allModels->isNotEmpty())
    <section class="our_model_section p100" id="model_section">
        <div class="container">
            <div class="section_head">
                <h2>Our Models</h2>
            </div>
            <div class="model_slider_wrap">
                <div class="model_slider">
                    @foreach ($allModels as $model)
                        <div class="model_slide">
                            <div class="model_box">
                                <img src="{{ asset('Models_Images')}}/{{ $model->image ?? '' }}">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="progress" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                <span class="slider__label sr-only"></span>
            </div>
            <div class="slick-btn-wrap">
                <button class="prev-btn"><img src="{{ asset('lure/images/arrow_prev.svg') }}"></button>
                <button class="next-btn"><img src="{{ asset('lure/images/arrow_next.svg') }}"></button>
            </div>
        </div>
    </section>
@endif

    <section class="accordion_sec p100">
    <!--<div class="bg_video">
            <video class="bg_accordion" width="100%" autoplay loop muted playsinline id="bg-vid">
                <source src="images/Aura2.mp4" type="video/mp4">
            </video>
        </div> -->
        <div class="container">
            <div class="join-us p_100">
                <div class="row">
                    <div class="col-md-7">
                        <div class="join-us-txt">
                            <h2>{{  $homecontent->join_us_heading ?? 'Join Us Today' }}</h2>
                            <p>{!!  $homecontent->join_us_text ??  'Whether you’re starting fresh or want to scale an existing account, we can help you
                                increase your followers and profits. Our OnlyFans management agency has helped countless
                                influencers earn thousands of dollars in their first month.'!!}</p>
                            <a href="" class="cta_btn btn-2">Apply Now</a>
                        </div>

                    </div>
                    <div class="col-md-5">
                        <div class="join_logo">
                            @if(isset($homecontent->join_us_image) && $homecontent->join_us_image != null)
                                <img src="{{ asset('lure/images') }}/{{ $homecontent->join_us_image ?? 'sdghd.png' }}" alt="{{ $homecontent->join_us_image ?? 'sdghd.png' }}">
                            @else
                                <img src="{{ asset('lure/images/sdghd.png') }}" alt="">
                            @endif
                        </div>
                       <!--  <div class="apply-img">
                            <img src="images/apply-now.png" alt="">
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
        {{-- @if(isset($faqs) && $faqs->isNotEmpty() && $faqs != null)
            <!-- <div class="acridian_block">
                <div class="container">
                    <div class="accordion_head">
                        <h2>Frequently <br>
                            Asked Questions </h2>
                    </div>
                    <div id="accordion">
                        @foreach($faqs as $faq)
                            <div class="card">
                                <div class="card-header" id="headingfour">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#description{{ $faq->id }}"
                                            aria-expanded="false" aria-controls="collapsefour">
                                            {{ $faq->question ?? '' }}
                                        </button>
                                    </h5>
                                </div>
                                <div id="description{{ $faq->id }}" class="collapse" aria-labelledby="headingfour" data-parent="#accordion">
                                    <div class="card-body">
                                        {!! $faq->description ?? '' !!}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div> -->
        @endif --}}
    </section>

@endsection