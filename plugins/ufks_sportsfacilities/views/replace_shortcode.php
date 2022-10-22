<div id="map" style="width: 100%; height: 500px;"></div>
<script>
    var facilities = [
        <?php
            foreach ( self::$model->get_list() as $item ): ?>
                {
                    title: "<?= $item->title ?>",
                    phone: "<?= $item->address ?>",
                    address: "<?= $item->phone ?>",
                    lat: <?= $item->lat ?>,
                    lng: <?= $item->lng ?>
                },                
            <?php endforeach ?>
    ];
    function init() {
        var map = new ymaps.Map("map", {
            center: [47.23, 39.69], 
            zoom: 11
        });
        var facilitiesCluster = new ymaps.Clusterer();
        facilities.forEach(function (facility) {
            facilitiesCluster.add(new ymaps.Placemark([ facility.lat, facility.lng ], {
                hintContent: facility.title,
                balloonContentHeader: facility.title,
                balloonContentBody: facility.address + '<br>' + facility.phone
            }));
        });
        map.geoObjects.add(facilitiesCluster);
    }
</script>
<script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&onload=init"></script>