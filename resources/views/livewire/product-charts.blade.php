<div>
    <div class="p-6 m-20 bg-white rounded shadow">
        {!! $chart->container() !!}
    </div>
    <script src="{{ LarapexChart::cdn() }}"></script>
    {{ $chart->script() }}
</div>
