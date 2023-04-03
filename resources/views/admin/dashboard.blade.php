<x-app-layout>
    <div class="row">
        <div class="col-lg-7 col-md-7  mb-4 order-0">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-7">
                        <div class="card-body">
                            <h5 class="card-title text-primary fw-bold">Wellcome back {{ auth()->user()->name }}</h5>
                            <p class="mb-4">
                                You have done <span class="fw-bold">72%</span> more sales today. Check your new badge
                                in
                                your profile.
                            </p>

                            <a href="javascript:;" class="btn btn-sm btn-outline-primary">View Badges</a>
                        </div>
                    </div>
                    <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                            <img src="../assets/img/illustrations/man-with-laptop-light.png" height="140"
                                alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png"
                                data-app-light-img="illustrations/man-with-laptop-light.png">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Revenue -->
            <div class="card mt-3">
                <div class="row row-bordered g-0">
                    <div class="col-md-8">
                        <h5 class="card-header m-0 me-2 pb-3">Total Revenue</h5>
                        <div id="totalRevenueChart" class="px-2" style="min-height: 315px;">
                            <div id="apexchartsansj11q0j"
                                class="apexcharts-canvas apexchartsansj11q0j apexcharts-theme-light"
                                style="width: 383px; height: 300px;"><svg id="SvgjsSvg4514" width="383"
                                    height="300" xmlns="http://www.w3.org/2000/svg" version="1.1"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev"
                                    class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)"
                                    style="background: transparent;">
                                    <foreignObject x="0" y="0" width="383" height="300">
                                        <div class="apexcharts-legend apexcharts-align-left apx-legend-position-top"
                                            xmlns="http://www.w3.org/1999/xhtml"
                                            style="right: 0px; position: absolute; left: 0px; top: 4px; max-height: 150px;">
                                            <div class="apexcharts-legend-series" rel="1" seriesname="2021"
                                                data:collapsed="false" style="margin: 2px 10px;"><span
                                                    class="apexcharts-legend-marker" rel="1"
                                                    data:collapsed="false"
                                                    style="background: rgb(105, 108, 255) !important; color: rgb(105, 108, 255); height: 8px; width: 8px; left: -3px; top: 0px; border-width: 0px; border-color: rgb(255, 255, 255); border-radius: 12px;"></span><span
                                                    class="apexcharts-legend-text" rel="1" i="0"
                                                    data:default-text="2021" data:collapsed="false"
                                                    style="color: rgb(161, 172, 184); font-size: 12px; font-weight: 400; font-family: Helvetica, Arial, sans-serif;">2021</span>
                                            </div>
                                            <div class="apexcharts-legend-series" rel="2" seriesname="2020"
                                                data:collapsed="false" style="margin: 2px 10px;"><span
                                                    class="apexcharts-legend-marker" rel="2"
                                                    data:collapsed="false"
                                                    style="background: rgb(3, 195, 236) !important; color: rgb(3, 195, 236); height: 8px; width: 8px; left: -3px; top: 0px; border-width: 0px; border-color: rgb(255, 255, 255); border-radius: 12px;"></span><span
                                                    class="apexcharts-legend-text" rel="2" i="1"
                                                    data:default-text="2020" data:collapsed="false"
                                                    style="color: rgb(161, 172, 184); font-size: 12px; font-weight: 400; font-family: Helvetica, Arial, sans-serif;">2020</span>
                                            </div>
                                        </div>
                                        <style type="text/css">
                                            .apexcharts-legend {
                                                display: flex;
                                                overflow: auto;
                                                padding: 0 10px;
                                            }

                                            .apexcharts-legend.apx-legend-position-bottom,
                                            .apexcharts-legend.apx-legend-position-top {
                                                flex-wrap: wrap
                                            }

                                            .apexcharts-legend.apx-legend-position-right,
                                            .apexcharts-legend.apx-legend-position-left {
                                                flex-direction: column;
                                                bottom: 0;
                                            }

                                            .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-left,
                                            .apexcharts-legend.apx-legend-position-top.apexcharts-align-left,
                                            .apexcharts-legend.apx-legend-position-right,
                                            .apexcharts-legend.apx-legend-position-left {
                                                justify-content: flex-start;
                                            }

                                            .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-center,
                                            .apexcharts-legend.apx-legend-position-top.apexcharts-align-center {
                                                justify-content: center;
                                            }

                                            .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-right,
                                            .apexcharts-legend.apx-legend-position-top.apexcharts-align-right {
                                                justify-content: flex-end;
                                            }

                                            .apexcharts-legend-series {
                                                cursor: pointer;
                                                line-height: normal;
                                            }

                                            .apexcharts-legend.apx-legend-position-bottom .apexcharts-legend-series,
                                            .apexcharts-legend.apx-legend-position-top .apexcharts-legend-series {
                                                display: flex;
                                                align-items: center;
                                            }

                                            .apexcharts-legend-text {
                                                position: relative;
                                                font-size: 14px;
                                            }

                                            .apexcharts-legend-text *,
                                            .apexcharts-legend-marker * {
                                                pointer-events: none;
                                            }

                                            .apexcharts-legend-marker {
                                                position: relative;
                                                display: inline-block;
                                                cursor: pointer;
                                                margin-right: 3px;
                                                border-style: solid;
                                            }

                                            .apexcharts-legend.apexcharts-align-right .apexcharts-legend-series,
                                            .apexcharts-legend.apexcharts-align-left .apexcharts-legend-series {
                                                display: inline-block;
                                            }

                                            .apexcharts-legend-series.apexcharts-no-click {
                                                cursor: auto;
                                            }

                                            .apexcharts-legend .apexcharts-hidden-zero-series,
                                            .apexcharts-legend .apexcharts-hidden-null-series {
                                                display: none !important;
                                            }

                                            .apexcharts-inactive-legend {
                                                opacity: 0.45;
                                            }
                                        </style>
                                    </foreignObject>
                                    <g id="SvgjsG4516" class="apexcharts-inner apexcharts-graphical"
                                        transform="translate(53.80000114440918, 52)">
                                        <defs id="SvgjsDefs4515">
                                            <linearGradient id="SvgjsLinearGradient4520" x1="0" y1="0"
                                                x2="0" y2="1">
                                                <stop id="SvgjsStop4521" stop-opacity="0.4"
                                                    stop-color="rgba(216,227,240,0.4)" offset="0"></stop>
                                                <stop id="SvgjsStop4522" stop-opacity="0.5"
                                                    stop-color="rgba(190,209,230,0.5)" offset="1"></stop>
                                                <stop id="SvgjsStop4523" stop-opacity="0.5"
                                                    stop-color="rgba(190,209,230,0.5)" offset="1"></stop>
                                            </linearGradient>
                                            <clipPath id="gridRectMaskansj11q0j">
                                                <rect id="SvgjsRect4525" width="319.1999988555908"
                                                    height="223.70079907417298" x="-5" y="-3"
                                                    rx="0" ry="0" opacity="1" stroke-width="0"
                                                    stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                            </clipPath>
                                            <clipPath id="forecastMaskansj11q0j"></clipPath>
                                            <clipPath id="nonForecastMaskansj11q0j"></clipPath>
                                            <clipPath id="gridRectMarkerMaskansj11q0j">
                                                <rect id="SvgjsRect4526" width="313.1999988555908"
                                                    height="221.70079907417298" x="-2" y="-2"
                                                    rx="0" ry="0" opacity="1" stroke-width="0"
                                                    stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                            </clipPath>
                                        </defs>
                                        <rect id="SvgjsRect4524" width="21.20228563581194"
                                            height="217.70079907417298" x="137.8286007445199" y="0"
                                            rx="0" ry="0" opacity="1" stroke-width="0"
                                            stroke-dasharray="3" fill="url(#SvgjsLinearGradient4520)"
                                            class="apexcharts-xcrosshairs" y2="217.70079907417298" filter="none"
                                            fill-opacity="0.9" x1="137.8286007445199" x2="137.8286007445199">
                                        </rect>
                                        <g id="SvgjsG4546" class="apexcharts-xaxis" transform="translate(0, 0)">
                                            <g id="SvgjsG4547" class="apexcharts-xaxis-texts-g"
                                                transform="translate(0, -4)"><text id="SvgjsText4549"
                                                    font-family="Helvetica, Arial, sans-serif" x="22.085714203970774"
                                                    y="246.70079907417298" text-anchor="middle"
                                                    dominant-baseline="auto" font-size="13px" font-weight="400"
                                                    fill="#a1acb8" class="apexcharts-text apexcharts-xaxis-label "
                                                    style="font-family: Helvetica, Arial, sans-serif;">
                                                    <tspan id="SvgjsTspan4550">Jan</tspan>
                                                    <title>Jan</title>
                                                </text><text id="SvgjsText4552"
                                                    font-family="Helvetica, Arial, sans-serif" x="66.25714261191231"
                                                    y="246.70079907417298" text-anchor="middle"
                                                    dominant-baseline="auto" font-size="13px" font-weight="400"
                                                    fill="#a1acb8" class="apexcharts-text apexcharts-xaxis-label "
                                                    style="font-family: Helvetica, Arial, sans-serif;">
                                                    <tspan id="SvgjsTspan4553">Feb</tspan>
                                                    <title>Feb</title>
                                                </text><text id="SvgjsText4555"
                                                    font-family="Helvetica, Arial, sans-serif" x="110.42857101985385"
                                                    y="246.70079907417298" text-anchor="middle"
                                                    dominant-baseline="auto" font-size="13px" font-weight="400"
                                                    fill="#a1acb8" class="apexcharts-text apexcharts-xaxis-label "
                                                    style="font-family: Helvetica, Arial, sans-serif;">
                                                    <tspan id="SvgjsTspan4556">Mar</tspan>
                                                    <title>Mar</title>
                                                </text><text id="SvgjsText4558"
                                                    font-family="Helvetica, Arial, sans-serif" x="154.5999994277954"
                                                    y="246.70079907417298" text-anchor="middle"
                                                    dominant-baseline="auto" font-size="13px" font-weight="400"
                                                    fill="#a1acb8" class="apexcharts-text apexcharts-xaxis-label "
                                                    style="font-family: Helvetica, Arial, sans-serif;">
                                                    <tspan id="SvgjsTspan4559">Apr</tspan>
                                                    <title>Apr</title>
                                                </text><text id="SvgjsText4561"
                                                    font-family="Helvetica, Arial, sans-serif" x="198.77142783573697"
                                                    y="246.70079907417298" text-anchor="middle"
                                                    dominant-baseline="auto" font-size="13px" font-weight="400"
                                                    fill="#a1acb8" class="apexcharts-text apexcharts-xaxis-label "
                                                    style="font-family: Helvetica, Arial, sans-serif;">
                                                    <tspan id="SvgjsTspan4562">May</tspan>
                                                    <title>May</title>
                                                </text><text id="SvgjsText4564"
                                                    font-family="Helvetica, Arial, sans-serif" x="242.94285624367853"
                                                    y="246.70079907417298" text-anchor="middle"
                                                    dominant-baseline="auto" font-size="13px" font-weight="400"
                                                    fill="#a1acb8" class="apexcharts-text apexcharts-xaxis-label "
                                                    style="font-family: Helvetica, Arial, sans-serif;">
                                                    <tspan id="SvgjsTspan4565">Jun</tspan>
                                                    <title>Jun</title>
                                                </text><text id="SvgjsText4567"
                                                    font-family="Helvetica, Arial, sans-serif" x="287.1142846516201"
                                                    y="246.70079907417298" text-anchor="middle"
                                                    dominant-baseline="auto" font-size="13px" font-weight="400"
                                                    fill="#a1acb8" class="apexcharts-text apexcharts-xaxis-label "
                                                    style="font-family: Helvetica, Arial, sans-serif;">
                                                    <tspan id="SvgjsTspan4568">Jul</tspan>
                                                    <title>Jul</title>
                                                </text></g>
                                        </g>
                                        <g id="SvgjsG4583" class="apexcharts-grid">
                                            <g id="SvgjsG4584" class="apexcharts-gridlines-horizontal">
                                                <line id="SvgjsLine4586" x1="0" y1="0"
                                                    x2="309.1999988555908" y2="0" stroke="#eceef1"
                                                    stroke-dasharray="0" stroke-linecap="butt"
                                                    class="apexcharts-gridline"></line>
                                                <line id="SvgjsLine4587" x1="0" y1="43.540159814834595"
                                                    x2="309.1999988555908" y2="43.540159814834595" stroke="#eceef1"
                                                    stroke-dasharray="0" stroke-linecap="butt"
                                                    class="apexcharts-gridline"></line>
                                                <line id="SvgjsLine4588" x1="0" y1="87.08031962966919"
                                                    x2="309.1999988555908" y2="87.08031962966919" stroke="#eceef1"
                                                    stroke-dasharray="0" stroke-linecap="butt"
                                                    class="apexcharts-gridline"></line>
                                                <line id="SvgjsLine4589" x1="0" y1="130.6204794445038"
                                                    x2="309.1999988555908" y2="130.6204794445038" stroke="#eceef1"
                                                    stroke-dasharray="0" stroke-linecap="butt"
                                                    class="apexcharts-gridline"></line>
                                                <line id="SvgjsLine4590" x1="0" y1="174.16063925933838"
                                                    x2="309.1999988555908" y2="174.16063925933838" stroke="#eceef1"
                                                    stroke-dasharray="0" stroke-linecap="butt"
                                                    class="apexcharts-gridline"></line>
                                                <line id="SvgjsLine4591" x1="0" y1="217.70079907417298"
                                                    x2="309.1999988555908" y2="217.70079907417298" stroke="#eceef1"
                                                    stroke-dasharray="0" stroke-linecap="butt"
                                                    class="apexcharts-gridline"></line>
                                            </g>
                                            <g id="SvgjsG4585" class="apexcharts-gridlines-vertical"></g>
                                            <line id="SvgjsLine4593" x1="0" y1="217.70079907417298"
                                                x2="309.1999988555908" y2="217.70079907417298" stroke="transparent"
                                                stroke-dasharray="0" stroke-linecap="butt">
                                            </line>
                                            <line id="SvgjsLine4592" x1="0" y1="1" x2="0"
                                                y2="217.70079907417298" stroke="transparent" stroke-dasharray="0"
                                                stroke-linecap="butt"></line>
                                        </g>
                                        <g id="SvgjsG4527" class="apexcharts-bar-series apexcharts-plot-series">
                                            <g id="SvgjsG4528" class="apexcharts-series" seriesName="2021"
                                                rel="1" data:realIndex="0">
                                                <path id="SvgjsPath4530"
                                                    d="M 11.484571386064804 120.62047944450379L 11.484571386064804 62.24819177780151Q 11.484571386064804 52.24819177780151 21.484571386064804 52.24819177780151L 16.686857021876747 52.24819177780151Q 26.686857021876747 52.24819177780151 26.686857021876747 62.24819177780151L 26.686857021876747 62.24819177780151L 26.686857021876747 120.62047944450379Q 26.686857021876747 130.6204794445038 16.686857021876747 130.6204794445038L 21.484571386064804 130.6204794445038Q 11.484571386064804 130.6204794445038 11.484571386064804 120.62047944450379z"
                                                    fill="rgba(105,108,255,0.85)" fill-opacity="1" stroke="#ffffff"
                                                    stroke-opacity="1" stroke-linecap="round" stroke-width="6"
                                                    stroke-dasharray="0" class="apexcharts-bar-area" index="0"
                                                    clip-path="url(#gridRectMaskansj11q0j)"
                                                    pathTo="M 11.484571386064804 120.62047944450379L 11.484571386064804 62.24819177780151Q 11.484571386064804 52.24819177780151 21.484571386064804 52.24819177780151L 16.686857021876747 52.24819177780151Q 26.686857021876747 52.24819177780151 26.686857021876747 62.24819177780151L 26.686857021876747 62.24819177780151L 26.686857021876747 120.62047944450379Q 26.686857021876747 130.6204794445038 16.686857021876747 130.6204794445038L 21.484571386064804 130.6204794445038Q 11.484571386064804 130.6204794445038 11.484571386064804 120.62047944450379z"
                                                    pathFrom="M 11.484571386064804 120.62047944450379L 11.484571386064804 120.62047944450379L 26.686857021876747 120.62047944450379L 26.686857021876747 120.62047944450379L 26.686857021876747 120.62047944450379L 26.686857021876747 120.62047944450379L 26.686857021876747 120.62047944450379L 11.484571386064804 120.62047944450379"
                                                    cy="52.24819177780151" cx="52.65599979400635" j="0"
                                                    val="18" barHeight="78.37228766670228"
                                                    barWidth="21.20228563581194"></path>
                                                <path id="SvgjsPath4531"
                                                    d="M 55.65599979400635 120.62047944450379L 55.65599979400635 110.14236757411956Q 55.65599979400635 100.14236757411956 65.65599979400635 100.14236757411956L 60.858285429818295 100.14236757411956Q 70.8582854298183 100.14236757411956 70.8582854298183 110.14236757411956L 70.8582854298183 110.14236757411956L 70.8582854298183 120.62047944450379Q 70.8582854298183 130.6204794445038 60.858285429818295 130.6204794445038L 65.65599979400635 130.6204794445038Q 55.65599979400635 130.6204794445038 55.65599979400635 120.62047944450379z"
                                                    fill="rgba(105,108,255,0.85)" fill-opacity="1" stroke="#ffffff"
                                                    stroke-opacity="1" stroke-linecap="round" stroke-width="6"
                                                    stroke-dasharray="0" class="apexcharts-bar-area" index="0"
                                                    clip-path="url(#gridRectMaskansj11q0j)"
                                                    pathTo="M 55.65599979400635 120.62047944450379L 55.65599979400635 110.14236757411956Q 55.65599979400635 100.14236757411956 65.65599979400635 100.14236757411956L 60.858285429818295 100.14236757411956Q 70.8582854298183 100.14236757411956 70.8582854298183 110.14236757411956L 70.8582854298183 110.14236757411956L 70.8582854298183 120.62047944450379Q 70.8582854298183 130.6204794445038 60.858285429818295 130.6204794445038L 65.65599979400635 130.6204794445038Q 55.65599979400635 130.6204794445038 55.65599979400635 120.62047944450379z"
                                                    pathFrom="M 55.65599979400635 120.62047944450379L 55.65599979400635 120.62047944450379L 70.8582854298183 120.62047944450379L 70.8582854298183 120.62047944450379L 70.8582854298183 120.62047944450379L 70.8582854298183 120.62047944450379L 70.8582854298183 120.62047944450379L 55.65599979400635 120.62047944450379"
                                                    cy="100.14236757411956" cx="96.8274282019479" j="1"
                                                    val="7" barHeight="30.478111870384218"
                                                    barWidth="21.20228563581194"></path>
                                                <path id="SvgjsPath4532"
                                                    d="M 99.8274282019479 120.62047944450379L 99.8274282019479 75.3102397222519Q 99.8274282019479 65.3102397222519 109.8274282019479 65.3102397222519L 105.02971383775983 65.3102397222519Q 115.02971383775983 65.3102397222519 115.02971383775983 75.3102397222519L 115.02971383775983 75.3102397222519L 115.02971383775983 120.62047944450379Q 115.02971383775983 130.6204794445038 105.02971383775983 130.6204794445038L 109.8274282019479 130.6204794445038Q 99.8274282019479 130.6204794445038 99.8274282019479 120.62047944450379z"
                                                    fill="rgba(105,108,255,0.85)" fill-opacity="1" stroke="#ffffff"
                                                    stroke-opacity="1" stroke-linecap="round" stroke-width="6"
                                                    stroke-dasharray="0" class="apexcharts-bar-area" index="0"
                                                    clip-path="url(#gridRectMaskansj11q0j)"
                                                    pathTo="M 99.8274282019479 120.62047944450379L 99.8274282019479 75.3102397222519Q 99.8274282019479 65.3102397222519 109.8274282019479 65.3102397222519L 105.02971383775983 65.3102397222519Q 115.02971383775983 65.3102397222519 115.02971383775983 75.3102397222519L 115.02971383775983 75.3102397222519L 115.02971383775983 120.62047944450379Q 115.02971383775983 130.6204794445038 105.02971383775983 130.6204794445038L 109.8274282019479 130.6204794445038Q 99.8274282019479 130.6204794445038 99.8274282019479 120.62047944450379z"
                                                    pathFrom="M 99.8274282019479 120.62047944450379L 99.8274282019479 120.62047944450379L 115.02971383775983 120.62047944450379L 115.02971383775983 120.62047944450379L 115.02971383775983 120.62047944450379L 115.02971383775983 120.62047944450379L 115.02971383775983 120.62047944450379L 99.8274282019479 120.62047944450379"
                                                    cy="65.3102397222519" cx="140.99885660988946" j="2"
                                                    val="15" barHeight="65.3102397222519"
                                                    barWidth="21.20228563581194"></path>
                                                <path id="SvgjsPath4533"
                                                    d="M 143.99885660988946 120.62047944450379L 143.99885660988946 14.354015981483457Q 143.99885660988946 4.354015981483457 153.99885660988946 4.354015981483457L 149.2011422457014 4.354015981483457Q 159.2011422457014 4.354015981483457 159.2011422457014 14.354015981483457L 159.2011422457014 14.354015981483457L 159.2011422457014 120.62047944450379Q 159.2011422457014 130.6204794445038 149.2011422457014 130.6204794445038L 153.99885660988946 130.6204794445038Q 143.99885660988946 130.6204794445038 143.99885660988946 120.62047944450379z"
                                                    fill="rgba(105,108,255,0.85)" fill-opacity="1" stroke="#ffffff"
                                                    stroke-opacity="1" stroke-linecap="round" stroke-width="6"
                                                    stroke-dasharray="0" class="apexcharts-bar-area" index="0"
                                                    clip-path="url(#gridRectMaskansj11q0j)"
                                                    pathTo="M 143.99885660988946 120.62047944450379L 143.99885660988946 14.354015981483457Q 143.99885660988946 4.354015981483457 153.99885660988946 4.354015981483457L 149.2011422457014 4.354015981483457Q 159.2011422457014 4.354015981483457 159.2011422457014 14.354015981483457L 159.2011422457014 14.354015981483457L 159.2011422457014 120.62047944450379Q 159.2011422457014 130.6204794445038 149.2011422457014 130.6204794445038L 153.99885660988946 130.6204794445038Q 143.99885660988946 130.6204794445038 143.99885660988946 120.62047944450379z"
                                                    pathFrom="M 143.99885660988946 120.62047944450379L 143.99885660988946 120.62047944450379L 159.2011422457014 120.62047944450379L 159.2011422457014 120.62047944450379L 159.2011422457014 120.62047944450379L 159.2011422457014 120.62047944450379L 159.2011422457014 120.62047944450379L 143.99885660988946 120.62047944450379"
                                                    cy="4.354015981483457" cx="185.17028501783102" j="3"
                                                    val="29" barHeight="126.26646346302033"
                                                    barWidth="21.20228563581194"></path>
                                                <path id="SvgjsPath4534"
                                                    d="M 188.17028501783102 120.62047944450379L 188.17028501783102 62.24819177780151Q 188.17028501783102 52.24819177780151 198.17028501783102 52.24819177780151L 193.37257065364295 52.24819177780151Q 203.37257065364295 52.24819177780151 203.37257065364295 62.24819177780151L 203.37257065364295 62.24819177780151L 203.37257065364295 120.62047944450379Q 203.37257065364295 130.6204794445038 193.37257065364295 130.6204794445038L 198.17028501783102 130.6204794445038Q 188.17028501783102 130.6204794445038 188.17028501783102 120.62047944450379z"
                                                    fill="rgba(105,108,255,0.85)" fill-opacity="1" stroke="#ffffff"
                                                    stroke-opacity="1" stroke-linecap="round" stroke-width="6"
                                                    stroke-dasharray="0" class="apexcharts-bar-area" index="0"
                                                    clip-path="url(#gridRectMaskansj11q0j)"
                                                    pathTo="M 188.17028501783102 120.62047944450379L 188.17028501783102 62.24819177780151Q 188.17028501783102 52.24819177780151 198.17028501783102 52.24819177780151L 193.37257065364295 52.24819177780151Q 203.37257065364295 52.24819177780151 203.37257065364295 62.24819177780151L 203.37257065364295 62.24819177780151L 203.37257065364295 120.62047944450379Q 203.37257065364295 130.6204794445038 193.37257065364295 130.6204794445038L 198.17028501783102 130.6204794445038Q 188.17028501783102 130.6204794445038 188.17028501783102 120.62047944450379z"
                                                    pathFrom="M 188.17028501783102 120.62047944450379L 188.17028501783102 120.62047944450379L 203.37257065364295 120.62047944450379L 203.37257065364295 120.62047944450379L 203.37257065364295 120.62047944450379L 203.37257065364295 120.62047944450379L 203.37257065364295 120.62047944450379L 188.17028501783102 120.62047944450379"
                                                    cy="52.24819177780151" cx="229.34171342577258" j="4"
                                                    val="18" barHeight="78.37228766670228"
                                                    barWidth="21.20228563581194"></path>
                                                <path id="SvgjsPath4535"
                                                    d="M 232.34171342577258 120.62047944450379L 232.34171342577258 88.37228766670228Q 232.34171342577258 78.37228766670228 242.34171342577258 78.37228766670228L 237.54399906158451 78.37228766670228Q 247.54399906158451 78.37228766670228 247.54399906158451 88.37228766670228L 247.54399906158451 88.37228766670228L 247.54399906158451 120.62047944450379Q 247.54399906158451 130.6204794445038 237.54399906158451 130.6204794445038L 242.34171342577258 130.6204794445038Q 232.34171342577258 130.6204794445038 232.34171342577258 120.62047944450379z"
                                                    fill="rgba(105,108,255,0.85)" fill-opacity="1" stroke="#ffffff"
                                                    stroke-opacity="1" stroke-linecap="round" stroke-width="6"
                                                    stroke-dasharray="0" class="apexcharts-bar-area" index="0"
                                                    clip-path="url(#gridRectMaskansj11q0j)"
                                                    pathTo="M 232.34171342577258 120.62047944450379L 232.34171342577258 88.37228766670228Q 232.34171342577258 78.37228766670228 242.34171342577258 78.37228766670228L 237.54399906158451 78.37228766670228Q 247.54399906158451 78.37228766670228 247.54399906158451 88.37228766670228L 247.54399906158451 88.37228766670228L 247.54399906158451 120.62047944450379Q 247.54399906158451 130.6204794445038 237.54399906158451 130.6204794445038L 242.34171342577258 130.6204794445038Q 232.34171342577258 130.6204794445038 232.34171342577258 120.62047944450379z"
                                                    pathFrom="M 232.34171342577258 120.62047944450379L 232.34171342577258 120.62047944450379L 247.54399906158451 120.62047944450379L 247.54399906158451 120.62047944450379L 247.54399906158451 120.62047944450379L 247.54399906158451 120.62047944450379L 247.54399906158451 120.62047944450379L 232.34171342577258 120.62047944450379"
                                                    cy="78.37228766670228" cx="273.51314183371414" j="5"
                                                    val="12" barHeight="52.248191777801516"
                                                    barWidth="21.20228563581194"></path>
                                                <path id="SvgjsPath4536"
                                                    d="M 276.51314183371414 120.62047944450379L 276.51314183371414 101.43433561115265Q 276.51314183371414 91.43433561115265 286.51314183371414 91.43433561115265L 281.7154274695261 91.43433561115265Q 291.7154274695261 91.43433561115265 291.7154274695261 101.43433561115265L 291.7154274695261 101.43433561115265L 291.7154274695261 120.62047944450379Q 291.7154274695261 130.6204794445038 281.7154274695261 130.6204794445038L 286.51314183371414 130.6204794445038Q 276.51314183371414 130.6204794445038 276.51314183371414 120.62047944450379z"
                                                    fill="rgba(105,108,255,0.85)" fill-opacity="1" stroke="#ffffff"
                                                    stroke-opacity="1" stroke-linecap="round" stroke-width="6"
                                                    stroke-dasharray="0" class="apexcharts-bar-area" index="0"
                                                    clip-path="url(#gridRectMaskansj11q0j)"
                                                    pathTo="M 276.51314183371414 120.62047944450379L 276.51314183371414 101.43433561115265Q 276.51314183371414 91.43433561115265 286.51314183371414 91.43433561115265L 281.7154274695261 91.43433561115265Q 291.7154274695261 91.43433561115265 291.7154274695261 101.43433561115265L 291.7154274695261 101.43433561115265L 291.7154274695261 120.62047944450379Q 291.7154274695261 130.6204794445038 281.7154274695261 130.6204794445038L 286.51314183371414 130.6204794445038Q 276.51314183371414 130.6204794445038 276.51314183371414 120.62047944450379z"
                                                    pathFrom="M 276.51314183371414 120.62047944450379L 276.51314183371414 120.62047944450379L 291.7154274695261 120.62047944450379L 291.7154274695261 120.62047944450379L 291.7154274695261 120.62047944450379L 291.7154274695261 120.62047944450379L 291.7154274695261 120.62047944450379L 276.51314183371414 120.62047944450379"
                                                    cy="91.43433561115265" cx="317.6845702416557" j="6"
                                                    val="9" barHeight="39.18614383335114"
                                                    barWidth="21.20228563581194"></path>
                                            </g>
                                            <g id="SvgjsG4537" class="apexcharts-series" seriesName="2020"
                                                rel="2" data:realIndex="1">
                                                <path id="SvgjsPath4539"
                                                    d="M 11.484571386064804 150.6204794445038L 11.484571386064804 187.22268720378878Q 11.484571386064804 197.22268720378878 21.484571386064804 197.22268720378878L 16.686857021876747 197.22268720378878Q 26.686857021876747 197.22268720378878 26.686857021876747 187.22268720378878L 26.686857021876747 187.22268720378878L 26.686857021876747 150.6204794445038Q 26.686857021876747 140.6204794445038 16.686857021876747 140.6204794445038L 21.484571386064804 140.6204794445038Q 11.484571386064804 140.6204794445038 11.484571386064804 150.6204794445038z"
                                                    fill="rgba(3,195,236,0.85)" fill-opacity="1" stroke="#ffffff"
                                                    stroke-opacity="1" stroke-linecap="round" stroke-width="6"
                                                    stroke-dasharray="0" class="apexcharts-bar-area" index="1"
                                                    clip-path="url(#gridRectMaskansj11q0j)"
                                                    pathTo="M 11.484571386064804 150.6204794445038L 11.484571386064804 187.22268720378878Q 11.484571386064804 197.22268720378878 21.484571386064804 197.22268720378878L 16.686857021876747 197.22268720378878Q 26.686857021876747 197.22268720378878 26.686857021876747 187.22268720378878L 26.686857021876747 187.22268720378878L 26.686857021876747 150.6204794445038Q 26.686857021876747 140.6204794445038 16.686857021876747 140.6204794445038L 21.484571386064804 140.6204794445038Q 11.484571386064804 140.6204794445038 11.484571386064804 150.6204794445038z"
                                                    pathFrom="M 11.484571386064804 150.6204794445038L 11.484571386064804 150.6204794445038L 26.686857021876747 150.6204794445038L 26.686857021876747 150.6204794445038L 26.686857021876747 150.6204794445038L 26.686857021876747 150.6204794445038L 26.686857021876747 150.6204794445038L 11.484571386064804 150.6204794445038"
                                                    cy="177.22268720378878" cx="52.65599979400635" j="0"
                                                    val="-13" barHeight="-56.60220775928498"
                                                    barWidth="21.20228563581194"></path>
                                                <path id="SvgjsPath4540"
                                                    d="M 55.65599979400635 150.6204794445038L 55.65599979400635 208.99276711120606Q 55.65599979400635 218.99276711120606 65.65599979400635 218.99276711120606L 60.858285429818295 218.99276711120606Q 70.8582854298183 218.99276711120606 70.8582854298183 208.99276711120606L 70.8582854298183 208.99276711120606L 70.8582854298183 150.6204794445038Q 70.8582854298183 140.6204794445038 60.858285429818295 140.6204794445038L 65.65599979400635 140.6204794445038Q 55.65599979400635 140.6204794445038 55.65599979400635 150.6204794445038z"
                                                    fill="rgba(3,195,236,0.85)" fill-opacity="1" stroke="#ffffff"
                                                    stroke-opacity="1" stroke-linecap="round" stroke-width="6"
                                                    stroke-dasharray="0" class="apexcharts-bar-area" index="1"
                                                    clip-path="url(#gridRectMaskansj11q0j)"
                                                    pathTo="M 55.65599979400635 150.6204794445038L 55.65599979400635 208.99276711120606Q 55.65599979400635 218.99276711120606 65.65599979400635 218.99276711120606L 60.858285429818295 218.99276711120606Q 70.8582854298183 218.99276711120606 70.8582854298183 208.99276711120606L 70.8582854298183 208.99276711120606L 70.8582854298183 150.6204794445038Q 70.8582854298183 140.6204794445038 60.858285429818295 140.6204794445038L 65.65599979400635 140.6204794445038Q 55.65599979400635 140.6204794445038 55.65599979400635 150.6204794445038z"
                                                    pathFrom="M 55.65599979400635 150.6204794445038L 55.65599979400635 150.6204794445038L 70.8582854298183 150.6204794445038L 70.8582854298183 150.6204794445038L 70.8582854298183 150.6204794445038L 70.8582854298183 150.6204794445038L 70.8582854298183 150.6204794445038L 55.65599979400635 150.6204794445038"
                                                    cy="198.99276711120606" cx="96.8274282019479" j="1"
                                                    val="-18" barHeight="-78.37228766670228"
                                                    barWidth="21.20228563581194"></path>
                                                <path id="SvgjsPath4541"
                                                    d="M 99.8274282019479 150.6204794445038L 99.8274282019479 169.80662327785492Q 99.8274282019479 179.80662327785492 109.8274282019479 179.80662327785492L 105.02971383775983 179.80662327785492Q 115.02971383775983 179.80662327785492 115.02971383775983 169.80662327785492L 115.02971383775983 169.80662327785492L 115.02971383775983 150.6204794445038Q 115.02971383775983 140.6204794445038 105.02971383775983 140.6204794445038L 109.8274282019479 140.6204794445038Q 99.8274282019479 140.6204794445038 99.8274282019479 150.6204794445038z"
                                                    fill="rgba(3,195,236,0.85)" fill-opacity="1" stroke="#ffffff"
                                                    stroke-opacity="1" stroke-linecap="round" stroke-width="6"
                                                    stroke-dasharray="0" class="apexcharts-bar-area" index="1"
                                                    clip-path="url(#gridRectMaskansj11q0j)"
                                                    pathTo="M 99.8274282019479 150.6204794445038L 99.8274282019479 169.80662327785492Q 99.8274282019479 179.80662327785492 109.8274282019479 179.80662327785492L 105.02971383775983 179.80662327785492Q 115.02971383775983 179.80662327785492 115.02971383775983 169.80662327785492L 115.02971383775983 169.80662327785492L 115.02971383775983 150.6204794445038Q 115.02971383775983 140.6204794445038 105.02971383775983 140.6204794445038L 109.8274282019479 140.6204794445038Q 99.8274282019479 140.6204794445038 99.8274282019479 150.6204794445038z"
                                                    pathFrom="M 99.8274282019479 150.6204794445038L 99.8274282019479 150.6204794445038L 115.02971383775983 150.6204794445038L 115.02971383775983 150.6204794445038L 115.02971383775983 150.6204794445038L 115.02971383775983 150.6204794445038L 115.02971383775983 150.6204794445038L 99.8274282019479 150.6204794445038"
                                                    cy="159.80662327785492" cx="140.99885660988946" j="2"
                                                    val="-9" barHeight="-39.18614383335114"
                                                    barWidth="21.20228563581194"></path>
                                                <path id="SvgjsPath4542"
                                                    d="M 143.99885660988946 150.6204794445038L 143.99885660988946 191.5767031852722Q 143.99885660988946 201.5767031852722 153.99885660988946 201.5767031852722L 149.2011422457014 201.5767031852722Q 159.2011422457014 201.5767031852722 159.2011422457014 191.5767031852722L 159.2011422457014 191.5767031852722L 159.2011422457014 150.6204794445038Q 159.2011422457014 140.6204794445038 149.2011422457014 140.6204794445038L 153.99885660988946 140.6204794445038Q 143.99885660988946 140.6204794445038 143.99885660988946 150.6204794445038z"
                                                    fill="rgba(3,195,236,0.85)" fill-opacity="1" stroke="#ffffff"
                                                    stroke-opacity="1" stroke-linecap="round" stroke-width="6"
                                                    stroke-dasharray="0" class="apexcharts-bar-area" index="1"
                                                    clip-path="url(#gridRectMaskansj11q0j)"
                                                    pathTo="M 143.99885660988946 150.6204794445038L 143.99885660988946 191.5767031852722Q 143.99885660988946 201.5767031852722 153.99885660988946 201.5767031852722L 149.2011422457014 201.5767031852722Q 159.2011422457014 201.5767031852722 159.2011422457014 191.5767031852722L 159.2011422457014 191.5767031852722L 159.2011422457014 150.6204794445038Q 159.2011422457014 140.6204794445038 149.2011422457014 140.6204794445038L 153.99885660988946 140.6204794445038Q 143.99885660988946 140.6204794445038 143.99885660988946 150.6204794445038z"
                                                    pathFrom="M 143.99885660988946 150.6204794445038L 143.99885660988946 150.6204794445038L 159.2011422457014 150.6204794445038L 159.2011422457014 150.6204794445038L 159.2011422457014 150.6204794445038L 159.2011422457014 150.6204794445038L 159.2011422457014 150.6204794445038L 143.99885660988946 150.6204794445038"
                                                    cy="181.5767031852722" cx="185.17028501783102" j="3"
                                                    val="-14" barHeight="-60.956223740768436"
                                                    barWidth="21.20228563581194"></path>
                                                <path id="SvgjsPath4543"
                                                    d="M 188.17028501783102 150.6204794445038L 188.17028501783102 152.39055935192107Q 188.17028501783102 162.39055935192107 198.17028501783102 162.39055935192107L 193.37257065364295 162.39055935192107Q 203.37257065364295 162.39055935192107 203.37257065364295 152.39055935192107L 203.37257065364295 152.39055935192107L 203.37257065364295 150.6204794445038Q 203.37257065364295 140.6204794445038 193.37257065364295 140.6204794445038L 198.17028501783102 140.6204794445038Q 188.17028501783102 140.6204794445038 188.17028501783102 150.6204794445038z"
                                                    fill="rgba(3,195,236,0.85)" fill-opacity="1" stroke="#ffffff"
                                                    stroke-opacity="1" stroke-linecap="round" stroke-width="6"
                                                    stroke-dasharray="0" class="apexcharts-bar-area" index="1"
                                                    clip-path="url(#gridRectMaskansj11q0j)"
                                                    pathTo="M 188.17028501783102 150.6204794445038L 188.17028501783102 152.39055935192107Q 188.17028501783102 162.39055935192107 198.17028501783102 162.39055935192107L 193.37257065364295 162.39055935192107Q 203.37257065364295 162.39055935192107 203.37257065364295 152.39055935192107L 203.37257065364295 152.39055935192107L 203.37257065364295 150.6204794445038Q 203.37257065364295 140.6204794445038 193.37257065364295 140.6204794445038L 198.17028501783102 140.6204794445038Q 188.17028501783102 140.6204794445038 188.17028501783102 150.6204794445038z"
                                                    pathFrom="M 188.17028501783102 150.6204794445038L 188.17028501783102 150.6204794445038L 203.37257065364295 150.6204794445038L 203.37257065364295 150.6204794445038L 203.37257065364295 150.6204794445038L 203.37257065364295 150.6204794445038L 203.37257065364295 150.6204794445038L 188.17028501783102 150.6204794445038"
                                                    cy="142.39055935192107" cx="229.34171342577258" j="4"
                                                    val="-5" barHeight="-21.770079907417298"
                                                    barWidth="21.20228563581194"></path>
                                                <path id="SvgjsPath4544"
                                                    d="M 232.34171342577258 150.6204794445038L 232.34171342577258 204.6387511297226Q 232.34171342577258 214.6387511297226 242.34171342577258 214.6387511297226L 237.54399906158451 214.6387511297226Q 247.54399906158451 214.6387511297226 247.54399906158451 204.6387511297226L 247.54399906158451 204.6387511297226L 247.54399906158451 150.6204794445038Q 247.54399906158451 140.6204794445038 237.54399906158451 140.6204794445038L 242.34171342577258 140.6204794445038Q 232.34171342577258 140.6204794445038 232.34171342577258 150.6204794445038z"
                                                    fill="rgba(3,195,236,0.85)" fill-opacity="1" stroke="#ffffff"
                                                    stroke-opacity="1" stroke-linecap="round" stroke-width="6"
                                                    stroke-dasharray="0" class="apexcharts-bar-area" index="1"
                                                    clip-path="url(#gridRectMaskansj11q0j)"
                                                    pathTo="M 232.34171342577258 150.6204794445038L 232.34171342577258 204.6387511297226Q 232.34171342577258 214.6387511297226 242.34171342577258 214.6387511297226L 237.54399906158451 214.6387511297226Q 247.54399906158451 214.6387511297226 247.54399906158451 204.6387511297226L 247.54399906158451 204.6387511297226L 247.54399906158451 150.6204794445038Q 247.54399906158451 140.6204794445038 237.54399906158451 140.6204794445038L 242.34171342577258 140.6204794445038Q 232.34171342577258 140.6204794445038 232.34171342577258 150.6204794445038z"
                                                    pathFrom="M 232.34171342577258 150.6204794445038L 232.34171342577258 150.6204794445038L 247.54399906158451 150.6204794445038L 247.54399906158451 150.6204794445038L 247.54399906158451 150.6204794445038L 247.54399906158451 150.6204794445038L 247.54399906158451 150.6204794445038L 232.34171342577258 150.6204794445038"
                                                    cy="194.6387511297226" cx="273.51314183371414" j="5"
                                                    val="-17" barHeight="-74.01827168521882"
                                                    barWidth="21.20228563581194"></path>
                                                <path id="SvgjsPath4545"
                                                    d="M 276.51314183371414 150.6204794445038L 276.51314183371414 195.9307191667557Q 276.51314183371414 205.9307191667557 286.51314183371414 205.9307191667557L 281.7154274695261 205.9307191667557Q 291.7154274695261 205.9307191667557 291.7154274695261 195.9307191667557L 291.7154274695261 195.9307191667557L 291.7154274695261 150.6204794445038Q 291.7154274695261 140.6204794445038 281.7154274695261 140.6204794445038L 286.51314183371414 140.6204794445038Q 276.51314183371414 140.6204794445038 276.51314183371414 150.6204794445038z"
                                                    fill="rgba(3,195,236,0.85)" fill-opacity="1" stroke="#ffffff"
                                                    stroke-opacity="1" stroke-linecap="round" stroke-width="6"
                                                    stroke-dasharray="0" class="apexcharts-bar-area" index="1"
                                                    clip-path="url(#gridRectMaskansj11q0j)"
                                                    pathTo="M 276.51314183371414 150.6204794445038L 276.51314183371414 195.9307191667557Q 276.51314183371414 205.9307191667557 286.51314183371414 205.9307191667557L 281.7154274695261 205.9307191667557Q 291.7154274695261 205.9307191667557 291.7154274695261 195.9307191667557L 291.7154274695261 195.9307191667557L 291.7154274695261 150.6204794445038Q 291.7154274695261 140.6204794445038 281.7154274695261 140.6204794445038L 286.51314183371414 140.6204794445038Q 276.51314183371414 140.6204794445038 276.51314183371414 150.6204794445038z"
                                                    pathFrom="M 276.51314183371414 150.6204794445038L 276.51314183371414 150.6204794445038L 291.7154274695261 150.6204794445038L 291.7154274695261 150.6204794445038L 291.7154274695261 150.6204794445038L 291.7154274695261 150.6204794445038L 291.7154274695261 150.6204794445038L 276.51314183371414 150.6204794445038"
                                                    cy="185.9307191667557" cx="317.6845702416557" j="6"
                                                    val="-15" barHeight="-65.3102397222519"
                                                    barWidth="21.20228563581194"></path>
                                            </g>
                                            <g id="SvgjsG4529" class="apexcharts-datalabels" data:realIndex="0">
                                            </g>
                                            <g id="SvgjsG4538" class="apexcharts-datalabels" data:realIndex="1">
                                            </g>
                                        </g>
                                        <line id="SvgjsLine4594" x1="0" y1="0"
                                            x2="309.1999988555908" y2="0" stroke="#b6b6b6"
                                            stroke-dasharray="0" stroke-width="1" stroke-linecap="butt"
                                            class="apexcharts-ycrosshairs"></line>
                                        <line id="SvgjsLine4595" x1="0" y1="0"
                                            x2="309.1999988555908" y2="0" stroke-dasharray="0"
                                            stroke-width="0" stroke-linecap="butt"
                                            class="apexcharts-ycrosshairs-hidden"></line>
                                        <g id="SvgjsG4596" class="apexcharts-yaxis-annotations"></g>
                                        <g id="SvgjsG4597" class="apexcharts-xaxis-annotations"></g>
                                        <g id="SvgjsG4598" class="apexcharts-point-annotations"></g>
                                    </g>
                                    <g id="SvgjsG4569" class="apexcharts-yaxis" rel="0"
                                        transform="translate(15.80000114440918, 0)">
                                        <g id="SvgjsG4570" class="apexcharts-yaxis-texts-g"><text id="SvgjsText4571"
                                                font-family="Helvetica, Arial, sans-serif" x="20"
                                                y="53.5" text-anchor="end" dominant-baseline="auto"
                                                font-size="13px" font-weight="400" fill="#a1acb8"
                                                class="apexcharts-text apexcharts-yaxis-label "
                                                style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan id="SvgjsTspan4572">30</tspan>
                                                <title>30</title>
                                            </text><text id="SvgjsText4573" font-family="Helvetica, Arial, sans-serif"
                                                x="20" y="97.0401598148346" text-anchor="end"
                                                dominant-baseline="auto" font-size="13px" font-weight="400"
                                                fill="#a1acb8" class="apexcharts-text apexcharts-yaxis-label "
                                                style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan id="SvgjsTspan4574">20</tspan>
                                                <title>20</title>
                                            </text><text id="SvgjsText4575" font-family="Helvetica, Arial, sans-serif"
                                                x="20" y="140.5803196296692" text-anchor="end"
                                                dominant-baseline="auto" font-size="13px" font-weight="400"
                                                fill="#a1acb8" class="apexcharts-text apexcharts-yaxis-label "
                                                style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan id="SvgjsTspan4576">10</tspan>
                                                <title>10</title>
                                            </text><text id="SvgjsText4577" font-family="Helvetica, Arial, sans-serif"
                                                x="20" y="184.1204794445038" text-anchor="end"
                                                dominant-baseline="auto" font-size="13px" font-weight="400"
                                                fill="#a1acb8" class="apexcharts-text apexcharts-yaxis-label "
                                                style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan id="SvgjsTspan4578">0</tspan>
                                                <title>0</title>
                                            </text><text id="SvgjsText4579" font-family="Helvetica, Arial, sans-serif"
                                                x="20" y="227.66063925933838" text-anchor="end"
                                                dominant-baseline="auto" font-size="13px" font-weight="400"
                                                fill="#a1acb8" class="apexcharts-text apexcharts-yaxis-label "
                                                style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan id="SvgjsTspan4580">-10</tspan>
                                                <title>-10</title>
                                            </text><text id="SvgjsText4581" font-family="Helvetica, Arial, sans-serif"
                                                x="20" y="271.200799074173" text-anchor="end"
                                                dominant-baseline="auto" font-size="13px" font-weight="400"
                                                fill="#a1acb8" class="apexcharts-text apexcharts-yaxis-label "
                                                style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan id="SvgjsTspan4582">-20</tspan>
                                                <title>-20</title>
                                            </text></g>
                                    </g>
                                    <g id="SvgjsG4517" class="apexcharts-annotations"></g>
                                </svg>
                                <div class="apexcharts-tooltip apexcharts-theme-light"
                                    style="left: 202.23px; top: 20.65px;">
                                    <div class="apexcharts-tooltip-title"
                                        style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">Apr
                                    </div>
                                    <div class="apexcharts-tooltip-series-group apexcharts-active"
                                        style="order: 1; display: flex;"><span class="apexcharts-tooltip-marker"
                                            style="background-color: rgba(105, 108, 255, 0.85);"></span>
                                        <div class="apexcharts-tooltip-text"
                                            style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                            <div class="apexcharts-tooltip-y-group"><span
                                                    class="apexcharts-tooltip-text-y-label">2021: </span><span
                                                    class="apexcharts-tooltip-text-y-value">29</span></div>
                                            <div class="apexcharts-tooltip-goals-group"><span
                                                    class="apexcharts-tooltip-text-goals-label"></span><span
                                                    class="apexcharts-tooltip-text-goals-value"></span></div>
                                            <div class="apexcharts-tooltip-z-group"><span
                                                    class="apexcharts-tooltip-text-z-label"></span><span
                                                    class="apexcharts-tooltip-text-z-value"></span></div>
                                        </div>
                                    </div>
                                    <div class="apexcharts-tooltip-series-group" style="order: 2; display: none;">
                                        <span class="apexcharts-tooltip-marker"
                                            style="background-color: rgba(105, 108, 255, 0.85);"></span>
                                        <div class="apexcharts-tooltip-text"
                                            style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                            <div class="apexcharts-tooltip-y-group"><span
                                                    class="apexcharts-tooltip-text-y-label">2021: </span><span
                                                    class="apexcharts-tooltip-text-y-value">29</span></div>
                                            <div class="apexcharts-tooltip-goals-group"><span
                                                    class="apexcharts-tooltip-text-goals-label"></span><span
                                                    class="apexcharts-tooltip-text-goals-value"></span></div>
                                            <div class="apexcharts-tooltip-z-group"><span
                                                    class="apexcharts-tooltip-text-z-label"></span><span
                                                    class="apexcharts-tooltip-text-z-value"></span></div>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light">
                                    <div class="apexcharts-yaxistooltip-text"></div>
                                </div>
                            </div>
                        </div>
                        <div class="resize-triggers">
                            <div class="expand-trigger">
                                <div style="width: 400px; height: 377px;"></div>
                            </div>
                            <div class="contract-trigger"></div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card-body">
                            <div class="text-center">
                                <div class="dropdown">
                                    <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button"
                                        id="growthReportId" data-bs-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        2022
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="growthReportId">
                                        <a class="dropdown-item" href="javascript:void(0);">2021</a>
                                        <a class="dropdown-item" href="javascript:void(0);">2020</a>
                                        <a class="dropdown-item" href="javascript:void(0);">2019</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="growthChart" style="min-height: 154.875px;">
                            <div id="apexchartsv8824q6s"
                                class="apexcharts-canvas apexchartsv8824q6s apexcharts-theme-light"
                                style="width: 200px; height: 154.875px;"><svg id="SvgjsSvg4769" width="200"
                                    height="154.875" xmlns="http://www.w3.org/2000/svg" version="1.1"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev"
                                    class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)"
                                    style="background: transparent;">
                                    <g id="SvgjsG4771" class="apexcharts-inner apexcharts-graphical"
                                        transform="translate(-7, -25)">
                                        <defs id="SvgjsDefs4770">
                                            <clipPath id="gridRectMaskv8824q6s">
                                                <rect id="SvgjsRect4773" width="222" height="285"
                                                    x="-3" y="-1" rx="0" ry="0"
                                                    opacity="1" stroke-width="0" stroke="none"
                                                    stroke-dasharray="0" fill="#fff"></rect>
                                            </clipPath>
                                            <clipPath id="forecastMaskv8824q6s"></clipPath>
                                            <clipPath id="nonForecastMaskv8824q6s"></clipPath>
                                            <clipPath id="gridRectMarkerMaskv8824q6s">
                                                <rect id="SvgjsRect4774" width="220" height="287"
                                                    x="-2" y="-2" rx="0" ry="0"
                                                    opacity="1" stroke-width="0" stroke="none"
                                                    stroke-dasharray="0" fill="#fff"></rect>
                                            </clipPath>
                                            <linearGradient id="SvgjsLinearGradient4779" x1="1"
                                                y1="0" x2="0" y2="1">
                                                <stop id="SvgjsStop4780" stop-opacity="1"
                                                    stop-color="rgba(105,108,255,1)" offset="0.3"></stop>
                                                <stop id="SvgjsStop4781" stop-opacity="0.6"
                                                    stop-color="rgba(255,255,255,0.6)" offset="0.7"></stop>
                                                <stop id="SvgjsStop4782" stop-opacity="0.6"
                                                    stop-color="rgba(255,255,255,0.6)" offset="1"></stop>
                                            </linearGradient>
                                            <linearGradient id="SvgjsLinearGradient4790" x1="1"
                                                y1="0" x2="0" y2="1">
                                                <stop id="SvgjsStop4791" stop-opacity="1"
                                                    stop-color="rgba(105,108,255,1)" offset="0.3"></stop>
                                                <stop id="SvgjsStop4792" stop-opacity="0.6"
                                                    stop-color="rgba(105,108,255,0.6)" offset="0.7"></stop>
                                                <stop id="SvgjsStop4793" stop-opacity="0.6"
                                                    stop-color="rgba(105,108,255,0.6)" offset="1"></stop>
                                            </linearGradient>
                                        </defs>
                                        <g id="SvgjsG4775" class="apexcharts-radialbar">
                                            <g id="SvgjsG4776">
                                                <g id="SvgjsG4777" class="apexcharts-tracks">
                                                    <g id="SvgjsG4778"
                                                        class="apexcharts-radialbar-track apexcharts-track"
                                                        rel="1">
                                                        <path id="apexcharts-radialbarTrack-0"
                                                            d="M 73.83506097560974 167.17541022773656 A 68.32987804878049 68.32987804878049 0 1 1 142.16493902439026 167.17541022773656"
                                                            fill="none" fill-opacity="1"
                                                            stroke="rgba(255,255,255,0.85)" stroke-opacity="1"
                                                            stroke-linecap="butt" stroke-width="17.357317073170734"
                                                            stroke-dasharray="0" class="apexcharts-radialbar-area"
                                                            data:pathOrig="M 73.83506097560974 167.17541022773656 A 68.32987804878049 68.32987804878049 0 1 1 142.16493902439026 167.17541022773656">
                                                        </path>
                                                    </g>
                                                </g>
                                                <g id="SvgjsG4784">
                                                    <g id="SvgjsG4789"
                                                        class="apexcharts-series apexcharts-radial-series"
                                                        seriesName="Growth" rel="1" data:realIndex="0">
                                                        <path id="SvgjsPath4794"
                                                            d="M 73.83506097560974 167.17541022773656 A 68.32987804878049 68.32987804878049 0 1 1 175.95555982735613 100.85758285229481"
                                                            fill="none" fill-opacity="0.85"
                                                            stroke="url(#SvgjsLinearGradient4790)" stroke-opacity="1"
                                                            stroke-linecap="butt" stroke-width="17.357317073170734"
                                                            stroke-dasharray="5"
                                                            class="apexcharts-radialbar-area apexcharts-radialbar-slice-0"
                                                            data:angle="234" data:value="78" index="0"
                                                            j="0"
                                                            data:pathOrig="M 73.83506097560974 167.17541022773656 A 68.32987804878049 68.32987804878049 0 1 1 175.95555982735613 100.85758285229481">
                                                        </path>
                                                    </g>
                                                    <circle id="SvgjsCircle4785" r="54.65121951219512" cx="108"
                                                        cy="108" class="apexcharts-radialbar-hollow"
                                                        fill="transparent">
                                                    </circle>
                                                    <g id="SvgjsG4786" class="apexcharts-datalabels-group"
                                                        transform="translate(0, 0) scale(1)" style="opacity: 1;">
                                                        <text id="SvgjsText4787" font-family="Public Sans"
                                                            x="108" y="123" text-anchor="middle"
                                                            dominant-baseline="auto" font-size="15px"
                                                            font-weight="500" fill="#566a7f"
                                                            class="apexcharts-text apexcharts-datalabel-label"
                                                            style="font-family: &quot;Public Sans&quot;;">Growth</text><text
                                                            id="SvgjsText4788" font-family="Public Sans"
                                                            x="108" y="99" text-anchor="middle"
                                                            dominant-baseline="auto" font-size="22px"
                                                            font-weight="500" fill="#566a7f"
                                                            class="apexcharts-text apexcharts-datalabel-value"
                                                            style="font-family: &quot;Public Sans&quot;;">78%</text>
                                                    </g>
                                                </g>
                                            </g>
                                        </g>
                                        <line id="SvgjsLine4795" x1="0" y1="0" x2="216"
                                            y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1"
                                            stroke-linecap="butt" class="apexcharts-ycrosshairs"></line>
                                        <line id="SvgjsLine4796" x1="0" y1="0" x2="216"
                                            y2="0" stroke-dasharray="0" stroke-width="0"
                                            stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line>
                                    </g>
                                    <g id="SvgjsG4772" class="apexcharts-annotations"></g>
                                </svg>
                                <div class="apexcharts-legend"></div>
                            </div>
                        </div>
                        <div class="text-center fw-semibold pt-3 mb-2">62% Company Growth</div>

                        <div class="d-flex px-xxl-4 px-lg-2 p-4 gap-xxl-3 gap-lg-1 gap-3 justify-content-between">
                            <div class="d-flex">
                                <div class="me-2">
                                    <span class="badge bg-label-primary p-2"><i
                                            class="bx bx-dollar text-primary"></i></span>
                                </div>
                                <div class="d-flex flex-column">
                                    <small>2022</small>
                                    <h6 class="mb-0">$32.5k</h6>
                                </div>
                            </div>
                            <div class="d-flex">
                                <div class="me-2">
                                    <span class="badge bg-label-info p-2"><i
                                            class="bx bx-wallet text-info"></i></span>
                                </div>
                                <div class="d-flex flex-column">
                                    <small>2021</small>
                                    <h6 class="mb-0">$41.2k</h6>
                                </div>
                            </div>
                        </div>
                        <div class="resize-triggers">
                            <div class="expand-trigger">
                                <div style="width: 201px; height: 377px;"></div>
                            </div>
                            <div class="contract-trigger"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-5 col-md-5 order-1">
            <div class="row">
                {{-- Users --}}
                @if (auth()->user()->role == 'admin')
                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                        <x-dashboard.cards.user-info title="المستخدمين" description="كل المستخدمين"
                            icon="bx bx-group" :count="$admins_count" />
                    </div>
                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                        <x-dashboard.cards.user-info title="الموظفين" description="كل الموظفين" :count="$employees_count"
                            color="success" />
                    </div>
                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                        <x-dashboard.cards.user-info title="المخترعين" description="كل المخترعين"
                            icon="bx bx-user-voice" :count="$inventors_count" color="danger" />
                    </div>

                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                        <x-dashboard.cards.user-info title="الفاعلين" description="كل الفاعلين"
                            icon="bx bx-user-voice" :count="$events_count" color="warning" />
                    </div>

                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                        <x-dashboard.cards.user-info title="مقديمي الخدمات" description="كل مقديمي الخدمات"
                            icon="bx bx-user-voice" :count="$service_providers_count" color="info" />
                    </div>
                    {{-- / End Users --}}

                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                        <x-dashboard.cards.user-info title="الأصناف" description="كل الأصناف" icon="bx bx-category"
                            :count="$categories_count" color="danger" />
                    </div>

                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                        <x-dashboard.cards.user-info title="الفعاليات" description="كل الفعاليات"
                            icon="bx bx-calendar-event" :count="$events_providers_count" color="warning" />
                    </div>

                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                        <x-dashboard.cards.user-info title="الباقات" description="كل الباقات" icon="bx bx-package"
                            :count="$packages_count" color="info" />
                    </div>
                @endif

                {{-- @if (in_array(auth()->user()->role, ['admin', 'event']))
                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                        <x-dashboard.cards.user-info title="الفعاليات" description="كل الفعاليات"
                            icon="bx bx-calendar-event" :count="$events_count" color="warning" />
                    </div>
                @endif --}}
            </div>
        </div>
        <!--/ Total Revenue -->
        <div class="col-12 col-md-8 col-lg-4 order-3 order-md-2">
            <div class="row">
                <div class="col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <img src="../assets/img/icons/unicons/paypal.png" alt="Credit Card"
                                        class="rounded">
                                </div>
                                <div class="dropdown">
                                    <button class="btn p-0" type="button" id="cardOpt4"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt4">
                                        <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                    </div>
                                </div>
                            </div>
                            <span class="d-block mb-1">Payments</span>
                            <h3 class="card-title text-nowrap mb-2">$2,456</h3>
                            <small class="text-danger fw-semibold"><i class="bx bx-down-arrow-alt"></i>
                                -14.82%</small>
                        </div>
                    </div>
                </div>
                <div class="col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <img src="../assets/img/icons/unicons/cc-primary.png" alt="Credit Card"
                                        class="rounded">
                                </div>
                                <div class="dropdown">
                                    <button class="btn p-0" type="button" id="cardOpt1"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="cardOpt1">
                                        <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                    </div>
                                </div>
                            </div>
                            <span class="fw-semibold d-block mb-1">Transactions</span>
                            <h3 class="card-title mb-2">$14,857</h3>
                            <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i>
                                +28.14%</small>
                        </div>
                    </div>
                </div>
                <!-- </div>
            <div class="row"> -->
                <div class="col-12 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between flex-sm-row flex-column gap-3"
                                style="position: relative;">
                                <div class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
                                    <div class="card-title">
                                        <h5 class="text-nowrap mb-2">Profile Report</h5>
                                        <span class="badge bg-label-warning rounded-pill">Year 2021</span>
                                    </div>
                                    <div class="mt-sm-auto">
                                        <small class="text-success text-nowrap fw-semibold"><i
                                                class="bx bx-chevron-up"></i> 68.2%</small>
                                        <h3 class="mb-0">$84,686k</h3>
                                    </div>
                                </div>
                                <div id="profileReportChart" style="min-height: 80px;">
                                    <div id="apexchartsx193uszg"
                                        class="apexcharts-canvas apexchartsx193uszg apexcharts-theme-light"
                                        style="width: 101px; height: 80px;"><svg id="SvgjsSvg4600" width="101"
                                            height="80" xmlns="http://www.w3.org/2000/svg" version="1.1"
                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                            xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg"
                                            xmlns:data="ApexChartsNS" transform="translate(0, 0)"
                                            style="background: transparent;">
                                            <g id="SvgjsG4602" class="apexcharts-inner apexcharts-graphical"
                                                transform="translate(0, 0)">
                                                <defs id="SvgjsDefs4601">
                                                    <clipPath id="gridRectMaskx193uszg">
                                                        <rect id="SvgjsRect4607" width="102" height="85"
                                                            x="-4.5" y="-2.5" rx="0"
                                                            ry="0" opacity="1" stroke-width="0"
                                                            stroke="none" stroke-dasharray="0" fill="#fff">
                                                        </rect>
                                                    </clipPath>
                                                    <clipPath id="forecastMaskx193uszg"></clipPath>
                                                    <clipPath id="nonForecastMaskx193uszg"></clipPath>
                                                    <clipPath id="gridRectMarkerMaskx193uszg">
                                                        <rect id="SvgjsRect4608" width="97" height="84"
                                                            x="-2" y="-2" rx="0"
                                                            ry="0" opacity="1" stroke-width="0"
                                                            stroke="none" stroke-dasharray="0" fill="#fff">
                                                        </rect>
                                                    </clipPath>
                                                    <filter id="SvgjsFilter4614" filterUnits="userSpaceOnUse"
                                                        width="200%" height="200%" x="-50%"
                                                        y="-50%">
                                                        <feFlood id="SvgjsFeFlood4615" flood-color="#ffab00"
                                                            flood-opacity="0.15" result="SvgjsFeFlood4615Out"
                                                            in="SourceGraphic"></feFlood>
                                                        <feComposite id="SvgjsFeComposite4616"
                                                            in="SvgjsFeFlood4615Out" in2="SourceAlpha"
                                                            operator="in" result="SvgjsFeComposite4616Out">
                                                        </feComposite>
                                                        <feOffset id="SvgjsFeOffset4617" dx="5"
                                                            dy="10" result="SvgjsFeOffset4617Out"
                                                            in="SvgjsFeComposite4616Out"></feOffset>
                                                        <feGaussianBlur id="SvgjsFeGaussianBlur4618"
                                                            stdDeviation="3 " result="SvgjsFeGaussianBlur4618Out"
                                                            in="SvgjsFeOffset4617Out"></feGaussianBlur>
                                                        <feMerge id="SvgjsFeMerge4619" result="SvgjsFeMerge4619Out"
                                                            in="SourceGraphic">
                                                            <feMergeNode id="SvgjsFeMergeNode4620"
                                                                in="SvgjsFeGaussianBlur4618Out"></feMergeNode>
                                                            <feMergeNode id="SvgjsFeMergeNode4621"
                                                                in="[object Arguments]"></feMergeNode>
                                                        </feMerge>
                                                        <feBlend id="SvgjsFeBlend4622" in="SourceGraphic"
                                                            in2="SvgjsFeMerge4619Out" mode="normal"
                                                            result="SvgjsFeBlend4622Out"></feBlend>
                                                    </filter>
                                                </defs>
                                                <line id="SvgjsLine4606" x1="0" y1="0"
                                                    x2="0" y2="80" stroke="#b6b6b6"
                                                    stroke-dasharray="3" stroke-linecap="butt"
                                                    class="apexcharts-xcrosshairs" x="0" y="0"
                                                    width="1" height="80" fill="#b1b9c4" filter="none"
                                                    fill-opacity="0.9" stroke-width="1"></line>
                                                <g id="SvgjsG4623" class="apexcharts-xaxis"
                                                    transform="translate(0, 0)">
                                                    <g id="SvgjsG4624" class="apexcharts-xaxis-texts-g"
                                                        transform="translate(0, -4)"></g>
                                                </g>
                                                <g id="SvgjsG4632" class="apexcharts-grid">
                                                    <g id="SvgjsG4633" class="apexcharts-gridlines-horizontal"
                                                        style="display: none;">
                                                        <line id="SvgjsLine4635" x1="0" y1="0"
                                                            x2="93" y2="0" stroke="#e0e0e0"
                                                            stroke-dasharray="0" stroke-linecap="butt"
                                                            class="apexcharts-gridline"></line>
                                                        <line id="SvgjsLine4636" x1="0" y1="20"
                                                            x2="93" y2="20" stroke="#e0e0e0"
                                                            stroke-dasharray="0" stroke-linecap="butt"
                                                            class="apexcharts-gridline"></line>
                                                        <line id="SvgjsLine4637" x1="0" y1="40"
                                                            x2="93" y2="40" stroke="#e0e0e0"
                                                            stroke-dasharray="0" stroke-linecap="butt"
                                                            class="apexcharts-gridline"></line>
                                                        <line id="SvgjsLine4638" x1="0" y1="60"
                                                            x2="93" y2="60" stroke="#e0e0e0"
                                                            stroke-dasharray="0" stroke-linecap="butt"
                                                            class="apexcharts-gridline"></line>
                                                        <line id="SvgjsLine4639" x1="0" y1="80"
                                                            x2="93" y2="80" stroke="#e0e0e0"
                                                            stroke-dasharray="0" stroke-linecap="butt"
                                                            class="apexcharts-gridline"></line>
                                                    </g>
                                                    <g id="SvgjsG4634" class="apexcharts-gridlines-vertical"
                                                        style="display: none;"></g>
                                                    <line id="SvgjsLine4641" x1="0" y1="80"
                                                        x2="93" y2="80" stroke="transparent"
                                                        stroke-dasharray="0" stroke-linecap="butt"></line>
                                                    <line id="SvgjsLine4640" x1="0" y1="1"
                                                        x2="0" y2="80" stroke="transparent"
                                                        stroke-dasharray="0" stroke-linecap="butt"></line>
                                                </g>
                                                <g id="SvgjsG4609"
                                                    class="apexcharts-line-series apexcharts-plot-series">
                                                    <g id="SvgjsG4610" class="apexcharts-series"
                                                        seriesName="seriesx1" data:longestSeries="true"
                                                        rel="1" data:realIndex="0">
                                                        <path id="SvgjsPath4613"
                                                            d="M 0 76C 6.51 76 12.090000000000002 12 18.6 12C 25.11 12 30.690000000000005 62 37.2 62C 43.71 62 49.29 22 55.8 22C 62.31 22 67.89 38 74.4 38C 80.91 38 86.49000000000001 6 93 6"
                                                            fill="none" fill-opacity="1"
                                                            stroke="rgba(255,171,0,0.85)" stroke-opacity="1"
                                                            stroke-linecap="butt" stroke-width="5"
                                                            stroke-dasharray="0" class="apexcharts-line"
                                                            index="0" clip-path="url(#gridRectMaskx193uszg)"
                                                            filter="url(#SvgjsFilter4614)"
                                                            pathTo="M 0 76C 6.51 76 12.090000000000002 12 18.6 12C 25.11 12 30.690000000000005 62 37.2 62C 43.71 62 49.29 22 55.8 22C 62.31 22 67.89 38 74.4 38C 80.91 38 86.49000000000001 6 93 6"
                                                            pathFrom="M -1 120L -1 120L 18.6 120L 37.2 120L 55.8 120L 74.4 120L 93 120">
                                                        </path>
                                                        <g id="SvgjsG4611" class="apexcharts-series-markers-wrap"
                                                            data:realIndex="0">
                                                            <g class="apexcharts-series-markers">
                                                                <circle id="SvgjsCircle4647" r="0"
                                                                    cx="0" cy="0"
                                                                    class="apexcharts-marker w78mlfan no-pointer-events"
                                                                    stroke="#ffffff" fill="#ffab00"
                                                                    fill-opacity="1" stroke-width="2"
                                                                    stroke-opacity="0.9" default-marker-size="0">
                                                                </circle>
                                                            </g>
                                                        </g>
                                                    </g>
                                                    <g id="SvgjsG4612" class="apexcharts-datalabels"
                                                        data:realIndex="0"></g>
                                                </g>
                                                <line id="SvgjsLine4642" x1="0" y1="0"
                                                    x2="93" y2="0" stroke="#b6b6b6"
                                                    stroke-dasharray="0" stroke-width="1" stroke-linecap="butt"
                                                    class="apexcharts-ycrosshairs"></line>
                                                <line id="SvgjsLine4643" x1="0" y1="0"
                                                    x2="93" y2="0" stroke-dasharray="0"
                                                    stroke-width="0" stroke-linecap="butt"
                                                    class="apexcharts-ycrosshairs-hidden"></line>
                                                <g id="SvgjsG4644" class="apexcharts-yaxis-annotations"></g>
                                                <g id="SvgjsG4645" class="apexcharts-xaxis-annotations"></g>
                                                <g id="SvgjsG4646" class="apexcharts-point-annotations"></g>
                                            </g>
                                            <rect id="SvgjsRect4605" width="0" height="0"
                                                x="0" y="0" rx="0" ry="0"
                                                opacity="1" stroke-width="0" stroke="none"
                                                stroke-dasharray="0" fill="#fefefe"></rect>
                                            <g id="SvgjsG4631" class="apexcharts-yaxis" rel="0"
                                                transform="translate(-18, 0)"></g>
                                            <g id="SvgjsG4603" class="apexcharts-annotations"></g>
                                        </svg>
                                        <div class="apexcharts-legend" style="max-height: 40px;"></div>
                                        <div class="apexcharts-tooltip apexcharts-theme-light">
                                            <div class="apexcharts-tooltip-title"
                                                style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                            </div>
                                            <div class="apexcharts-tooltip-series-group" style="order: 1;"><span
                                                    class="apexcharts-tooltip-marker"
                                                    style="background-color: rgb(255, 171, 0);"></span>
                                                <div class="apexcharts-tooltip-text"
                                                    style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                    <div class="apexcharts-tooltip-y-group"><span
                                                            class="apexcharts-tooltip-text-y-label"></span><span
                                                            class="apexcharts-tooltip-text-y-value"></span></div>
                                                    <div class="apexcharts-tooltip-goals-group"><span
                                                            class="apexcharts-tooltip-text-goals-label"></span><span
                                                            class="apexcharts-tooltip-text-goals-value"></span>
                                                    </div>
                                                    <div class="apexcharts-tooltip-z-group"><span
                                                            class="apexcharts-tooltip-text-z-label"></span><span
                                                            class="apexcharts-tooltip-text-z-value"></span></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light">
                                            <div class="apexcharts-yaxistooltip-text"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="resize-triggers">
                                    <div class="expand-trigger">
                                        <div style="width: 239px; height: 118px;"></div>
                                    </div>
                                    <div class="contract-trigger"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">

        <!-- Transactions -->
        <div class="col-md-6 col-lg-4 order-2 mb-4">
            <div class="card h-100">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="card-title m-0 me-2">Transactions</h5>
                    <div class="dropdown">
                        <button class="btn p-0" type="button" id="transactionID" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="transactionID">
                            <a class="dropdown-item" href="javascript:void(0);">Last 28 Days</a>
                            <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
                            <a class="dropdown-item" href="javascript:void(0);">Last Year</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <ul class="p-0 m-0">
                        <li class="d-flex mb-4 pb-1">
                            <div class="avatar flex-shrink-0 me-3">
                                <img src="../assets/img/icons/unicons/paypal.png" alt="User" class="rounded">
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <small class="text-muted d-block mb-1">Paypal</small>
                                    <h6 class="mb-0">Send money</h6>
                                </div>
                                <div class="user-progress d-flex align-items-center gap-1">
                                    <h6 class="mb-0">+82.6</h6>
                                    <span class="text-muted">USD</span>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex mb-4 pb-1">
                            <div class="avatar flex-shrink-0 me-3">
                                <img src="../assets/img/icons/unicons/wallet.png" alt="User" class="rounded">
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <small class="text-muted d-block mb-1">Wallet</small>
                                    <h6 class="mb-0">Mac'D</h6>
                                </div>
                                <div class="user-progress d-flex align-items-center gap-1">
                                    <h6 class="mb-0">+270.69</h6>
                                    <span class="text-muted">USD</span>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex mb-4 pb-1">
                            <div class="avatar flex-shrink-0 me-3">
                                <img src="../assets/img/icons/unicons/chart.png" alt="User" class="rounded">
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <small class="text-muted d-block mb-1">Transfer</small>
                                    <h6 class="mb-0">Refund</h6>
                                </div>
                                <div class="user-progress d-flex align-items-center gap-1">
                                    <h6 class="mb-0">+637.91</h6>
                                    <span class="text-muted">USD</span>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex mb-4 pb-1">
                            <div class="avatar flex-shrink-0 me-3">
                                <img src="../assets/img/icons/unicons/cc-success.png" alt="User"
                                    class="rounded">
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <small class="text-muted d-block mb-1">Credit Card</small>
                                    <h6 class="mb-0">Ordered Food</h6>
                                </div>
                                <div class="user-progress d-flex align-items-center gap-1">
                                    <h6 class="mb-0">-838.71</h6>
                                    <span class="text-muted">USD</span>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex mb-4 pb-1">
                            <div class="avatar flex-shrink-0 me-3">
                                <img src="../assets/img/icons/unicons/wallet.png" alt="User" class="rounded">
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <small class="text-muted d-block mb-1">Wallet</small>
                                    <h6 class="mb-0">Starbucks</h6>
                                </div>
                                <div class="user-progress d-flex align-items-center gap-1">
                                    <h6 class="mb-0">+203.33</h6>
                                    <span class="text-muted">USD</span>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex">
                            <div class="avatar flex-shrink-0 me-3">
                                <img src="../assets/img/icons/unicons/cc-warning.png" alt="User"
                                    class="rounded">
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <small class="text-muted d-block mb-1">Mastercard</small>
                                    <h6 class="mb-0">Ordered Food</h6>
                                </div>
                                <div class="user-progress d-flex align-items-center gap-1">
                                    <h6 class="mb-0">-92.45</h6>
                                    <span class="text-muted">USD</span>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--/ Transactions -->
    </div>

</x-app-layout>
