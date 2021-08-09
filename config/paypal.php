<?php 
    return [ 
        'client_id' =>'ARjw1ny-A9NzBh-UXYKG5MAGwCpVf_7_hgAqaFbdbleto_6bMuk8P5-5NqiRxi1FCmfENRPyEYuvxAFZ',
        'secret' =>'EKcrZoBO_h7K6mrvJuO2QmEqDHeISETdj7_9r6lsU9zI3J9KvNw2CZSqimtwRhPjRaD4fgV_mYTwXFdd',
        'settings' => array(
            'mode' => 'sandbox',
            'http.ConnectionTimeOut' => 1000,
            'log.LogEnabled' => true,
            'log.FileName' => storage_path() . '/logs/paypal.log',
            'log.LogLevel' => 'FINE'
        ),
    ];