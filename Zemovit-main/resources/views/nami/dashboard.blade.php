@extends('nami.layout.indexs.index')
@section("style")
    <style>
        .tapico-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 1rem;
        }

        .hero-card {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            border: none;
            overflow: hidden;
            margin-bottom: 3rem;
            position: relative;
        }

        .hero-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="1" fill="white" opacity="0.1"/><circle cx="75" cy="75" r="1" fill="white" opacity="0.1"/><circle cx="50" cy="10" r="0.5" fill="white" opacity="0.1"/><circle cx="10" cy="60" r="0.5" fill="white" opacity="0.1"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>') repeat;
            opacity: 0.1;
        }

        .hero-content {
            position: relative;
            z-index: 2;
            padding: 3rem;
        }

        .hero-image {
            width: 200px;
            height: auto;
            opacity: 0.9;
            transition: transform 0.3s ease;
        }

        .hero-image:hover {
            transform: scale(1.05);
        }

        .hero-title {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 2rem;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .hero-stats {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            padding: 1.5rem;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .stat-card {
            background: linear-gradient(145deg, #ffffff, #f8f9fa);
            border-radius: 20px;
            border: none;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent);
            transition: left 0.5s;
        }

        .stat-card:hover::before {
            left: 100%;
        }

        .stat-card:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }

        .stat-icon {
            width: 70px;
            height: 70px;
            border-radius: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
            margin-bottom: 1rem;
            position: relative;
            overflow: hidden;
        }

        .stat-icon::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(45deg, transparent 30%, rgba(255, 255, 255, 0.3) 50%, transparent 70%);
            transform: rotate(45deg);
            animation: shine 3s infinite;
        }

        @keyframes shine {
            0% { transform: translateX(-100%) translateY(-100%) rotate(45deg); }
            50% { transform: translateX(100%) translateY(100%) rotate(45deg); }
            100% { transform: translateX(-100%) translateY(-100%) rotate(45deg); }
        }

        .icon-products { background: linear-gradient(135deg, #ff6b6b, #feca57); }
        .icon-sliders { background: linear-gradient(135deg, #48cae4, #0077b6); }
        .icon-blogs { background: linear-gradient(135deg, #43aa8b, #277da1); }
        .icon-careers { background: linear-gradient(135deg, #f72585, #b5179e); }
        .icon-applies { background: linear-gradient(135deg, #7209b7, #480ca8); }
        .icon-groups { background: linear-gradient(135deg, #06ffa5, #00d4aa); }
        .icon-branches { background: linear-gradient(135deg, #ffd23f, #ff6b35); }
        .icon-fields { background: linear-gradient(135deg, #06d6a0, #118ab2); }

        .stat-label {
            font-size: 0.85rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #6c757d;
            margin-bottom: 0.5rem;
        }

        .stat-number {
            font-size: 2.5rem;
            font-weight: 700;
            color: #212529;
            margin: 0;
            line-height: 1;
        }

        .stat-trend {
            font-size: 0.75rem;
            color: #28a745;
            margin-top: 0.5rem;
        }

        .section-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: #fff;
            margin-bottom: 2rem;
            text-align: center;
            position: relative;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 50px;
            height: 3px;
            background: linear-gradient(90deg, #ff6b6b, #feca57);
            border-radius: 2px;
        }

        @media (max-width: 768px) {
            .hero-title { font-size: 1.8rem; }
            .hero-content { padding: 2rem; }
            .stat-number { font-size: 2rem; }
            .hero-image { width: 150px; }
        }

        .pulse {
            animation: pulse 2s infinite;
        }
        .bg-certification {
            background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
        }

        .stat-card {
            border-radius: 10px;
            padding: 1.5rem;
            transition: transform 0.3s;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }

        .stat-icon {
            width: 60px;
            height: 60px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
            font-size: 1.75rem;
        }
        @keyframes pulse {
            0% { box-shadow: 0 0 0 0 rgba(102, 126, 234, 0.4); }
            70% { box-shadow: 0 0 0 10px rgba(102, 126, 234, 0); }
            100% { box-shadow: 0 0 0 0 rgba(102, 126, 234, 0); }
        }
        .icon-faq {
            background: linear-gradient(135deg, #f39c12, #f1c40f);
        }

    </style>
@endsection
@section('page-title')
    {{  trans('auth.home') }}
@endsection
@section('page-links')
    <li class="breadcrumb-item active" aria-current="page"> {{  trans('auth.home') }}</li>
@endsection
@section('content')

    <div class="page-body px-xl-4 px-sm-2 px-0 py-lg-2 py-1 mt-0 mt-lg-3">
        <div class="container-fluid">
            <div class="row g-4 mb-5">
                <!-- Products Card -->
                <div class="col-lg-4 col-md-6">
                    <div class="stat-card h-100">
                        <div class="stat-icon icon-products">
                            <i class="fas fa-box text-white"></i>
                        </div>
                        <div class="stat-label">@lang('zemovit.products')</div>
                        <h4 class="stat-number">{{ $data['products'] ?? 0 }}</h4>
                    </div>
                </div>

                <!-- Sliders Card -->
                <div class="col-lg-4 col-md-6">
                    <div class="stat-card h-100">
                        <div class="stat-icon icon-products">
                            <i class="fas fa-images text-white"></i>
                        </div>
                        <div class="stat-label">@lang('zemovit.banners')</div>
                        <h4 class="stat-number">{{ $data['banners'] ?? 0 }}</h4>
                    </div>
                </div>

                <!-- Applications Card -->
                <div class="col-lg-4 col-md-6">
                    <div class="stat-card h-100">
                        <div class="stat-icon icon-applies">
                            <i class="fas fa-file-alt text-white"></i>
                        </div>
                        <div class="stat-label">@lang('zemovit.contact')</div>
                        <h4 class="stat-number">{{ $data['contacts'] ?? 0 }}</h4>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="stat-card h-100">
                        <div class="stat-icon icon-applies">
                            <i class="fas fa-file-alt text-white"></i>
                        </div>
                        <div class="stat-label">@lang('zemovit.about-us')</div>
                        <h4 class="stat-number">{{ $data['abouts'] ?? 0 }}</h4>
                    </div>
                </div>
            </div>
        </div>
{{--        @if (isset($data['page_view_chart']))--}}
{{--            <div class="row row-cols-lg-4 row-cols-md-3 row-cols-sm-2 row-cols-1 g-xl-3 g-2 mb-3">--}}
{{--                <div class="card-body stat-card">--}}
{{--                    <div id="apex-charts"></div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        @endif--}}
    </div>
@endsection
@section('js')
    <script src="{{ asset('admin') }}/assets/js/bundle/apexcharts.bundle.js"></script>
    <script src="{{ asset('admin') }}/assets/js/bundle/apexcharts.bundle.js"></script>
    <script>
        // Get the chart data from the Laravel controller
        var pageViewChartData = @json($data['page_view_chart'] ?? []);

        // Prepare the data for ApexCharts
        var chartData = pageViewChartData.map(function(entry) {
            return {
                x: entry.date,
                y: entry.views
            };
        });

        var options = {
            chart: {
                height: 300,
                type: 'area',
                stacked: true

            },
            dataLabels: {
                enabled: false,
            },
            title: {
                text: "{{ trans('zemovit.Views Over the Last 30 Days') }}",
                align: 'center'
            },
            legend: {
                position: 'top',
                horizontalAlign: 'center',
                show: true,
            },
            colors: ['var(--chart-color1)', 'var(--chart-color2)', 'var(--chart-color3)'],
            series: [{
                name: "{{ trans('zemovit.view_count') }}",
                data: chartData
            }],
            xaxis: {
                title: {
                    text: "{{ trans('zemovit.days') }}"
                },
            },
            yaxis: {
                title: {
                    text: "{{ trans('zemovit.view_count') }}"
                }
            },
            labels: chartData.map(entry => entry.x),
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                        width: 200
                    },
                    legend: {
                        position: 'bottom'
                    }
                }
            }]
        };

        var chart = new ApexCharts(document.querySelector("#apex-charts"), options);
        chart.render();
    </script>


    <script>
        // Get the chart data from the Laravel controller
        var pageViewChartPagesData = @json($data['page_view_chart_pages']);

        // Prepare the data for ApexCharts
        var chartData = pageViewChartPagesData.map(function(entry) {
            return {
                x: entry.page_link,
                y: entry.views
            };
        });

        var options = {
            chart: {
                height: 300,
                type: 'area',
                stacked: true

            },
            dataLabels: {
                enabled: false,
            },
            title: {
                text: "{{ trans('zemovit.Page Views Over the Last 30 Days') }}",
                align: 'center'
            },
            legend: {
                position: 'top',
                horizontalAlign: 'center',
                show: true,
            },
            colors: ['var(--chart-color1)', 'var(--chart-color2)', 'var(--chart-color3)'],
            series: [{
                name: "{{ trans('zemovit.view_count') }}",
                data: chartData
            }],
            xaxis: {
                title: {
                    text: "{{ trans('zemovit.pages') }}"
                },
                labels: {
                    rotate: -45 // Rotate labels for better readability
                }
            },
            yaxis: {
                title: {
                    text: "{{ trans('zemovit.view_count') }}"
                }
            },
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                        width: 200
                    },
                    legend: {
                        position: 'bottom'
                    }
                }
            }]
        };

        var chart = new ApexCharts(document.querySelector("#apex-charts-pages"), options);
        chart.render();
    </script>
@endsection
