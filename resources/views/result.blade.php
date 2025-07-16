@extends('layouts.app')

@section('title', 'アップロード結果')

@section('content')

<!-- Chart.js CDN(グラフのライブラリ読み込み) -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <div class="container py-4">
    <h1 class="mb-4">実行結果</h1>
    <!--css-->
    <style>
    body {
        user-select:  none; /*キャレットが表示されないように設定*/
    }
    .time_weather {
      display: flex;
      gap: 12px; /* 各項目の間に余白を追加 */
      align-items: center; /* 高さを揃える */
    }
    .place{
        margin-left:auto;
    }
  </style>
<div class="time_weather">
    <h4 class="day">撮影日時：7/31</h4>
    <h4 class="weather">天候：晴天</h4>
    <h4 class="temperature">気温：36℃</h4>
    <h4 class="place">撮影場所：神戸市北区有野町</h4>
</div>

    <!-- グラフ描画領域 -->
    <div class="row mt-5">
        <div class="col-md-4 mb-4"><canvas id="Cars" width="300" height="300"></canvas></div>
        <div class="col-md-4 mb-4"><canvas id="Number_Place_1" width="300" height="300"></canvas></div>
        <div class="col-md-4 mb-4"><canvas id="Number_Place_2" width="300" height="300"></canvas></div>
        <div class="col-md-4 mb-4"><canvas id="Types" width="300" height="300"></canvas></div>
        <div class="col-md-4 mb-4"><canvas id="Purpose" width="300" height="300"></canvas></div>
    </div>

    <!--グラフの表示領域定義-->
            <!-- グラフスクリプト -->
    <script>
         // 棒グラフ：時間帯ごとの交通量
        new Chart(document.getElementById('Cars'), {
            type: 'bar',
            data: {
                labels: ['11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00', '18:00'],
                datasets: [{
                    label: '合計台数',
                    data: [230, 241, 261, 232, 240, 230, 241, 270],
                    backgroundColor: '#90caf9'
                }]
            },
            options: {
                responsive: false,
                maintainAspectRatio: false,
                plugins: {
                    title: {
                        display: true,
                        text: '時間ごとの交通量合計グラフ　合計台数：1945台'
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

         // 円グラフ（例：地域ごとの台数）
         //地域（兵庫）
        new Chart(document.getElementById('Number_Place_1'), {
            type: 'pie',//グラフ種類指定(pie chart)
            data: {
                labels: ['神戸', '姫路','その他'],
                datasets: [{
                    data: [1265, 195, 486],
                    backgroundColor: ['#f44336', '#ff9800','#C0C0C0']
                }]
            },
            options: {
                responsive: false,
                maintainAspectRatio: false,
                plugins: {
                    title: {
                        display: true,
                        text: '地域ナンバー（兵庫県内）'
                    },
                    legend: {
                        position: 'right'
                    }
                }
            }
        });

        new Chart(document.getElementById('Number_Place_2'), {
            type: 'pie',//グラフ種類指定(pie chart)
            data: {
                labels: ['兵庫県', '近畿地方','その他'],
                datasets: [{
                    data: [1460, 380, 106],
                    backgroundColor: ['#f44336', '#ff9800','#C0C0C0']
                }]
            },
            options: {
                responsive: false,
                maintainAspectRatio: false,
                plugins: {
                    title: {
                        display: true,
                        text: '地域ナンバー（地方）'
                    },
                    legend: {
                        position: 'right'
                    }
                }
            }
        });

        // 円グラフ：車種別構成
        new Chart(document.getElementById('Types'), {
            type: 'pie',//グラフの種類指定
            data: {
                labels: ['乗用車', 'トラック', 'バス'],
                datasets: [{
                    data: [1654, 195, 97],
                    backgroundColor: ['#f44336', '#ff9800','#ffeb3b' /*, '#2196f3', '#4caf50','#C0C0C0'*/]
                }]
            },
            options: {
                responsive: false,
                maintainAspectRatio: false,
                plugins: {
                    title: { display: true, text: '車種別構成' },
                    legend: { position: 'right' }
                }
            }
        });

        // 円グラフ：利用者属性（目的別）
        new Chart(document.getElementById('Purpose'), {
            type: 'pie',
            data: {
                labels: ['地元利用', '観光客', '運送', 'バス'],
                datasets: [{
                    data: [1070, 584, 195, 97],
                    backgroundColor: ['#f44336', '#ff9800', '#FFDF29', '#2196f3']
                }]
            },
            options: {
                responsive: false,
                maintainAspectRatio: false,
                plugins: {
                    title: { display: true, text: '利用者属性（目的別）' },
                    legend: { position: 'right' }
                }
            }
        });
    </script>



    <!--    <section class="mb-5">
    <h2 class="h4">Python 出力</h2>
    {{-- <pre class="bg-light p-3 border rounded">{{ $pythonOut }}</pre> --}}
    </section>
    <section>
        <h2 class="h4 mb-3">アップロードした動画</h2>
        <video
            {{-- src="{{ asset('storage/' . $videoPath) }}" --}}
            controls
            style="max-width: 100%; height: auto;">
            お使いのブラウザは video タグをサポートしていません。
        </video>
    </section>

    <div class="mt-4">
        {{-- <a href="{{ route('video.form') }}" class="btn btn-secondary"> --}}
            もう一度アップロード
        </a>
    </div>
-->
</div>
<!--CSS記入欄-->
<style>
    .time_weather h4 {
        margin-right: 20px; /* 項目間の余白 */
    }
</style>
@endsection
