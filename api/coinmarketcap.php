<?php
    $url = "https://pro-api.coinmarketcap.com/v1/cryptocurrency/listings/latest";
    $api_key = "CMC_PRO_API_KEY=9e21ab75-110b-41ce-9fb7-9b7600735331";
    $option = "start=1&limit=200";
    $str = file_get_contents($url . "?" . $api_key . "&" . $option);
    $info = json_decode($str);
    $status = $info->status;
    $data = $info->data;
    //debug($info);
    function formatMoney($num) {
        return number_format($num, 2, '.', ',');
    }
?>
<div class="wrap">
    <table id="cmc">
        <colgroup>
            <col style="width:5%">
            <col style="width:20%">
            <col style="width:15%">
            <col style="width:10%">
            <col style="width:15%">
            <col style="width:20%">
            <col style="width:10%">
        </colgroup>
        <thead>
        <tr>
            <th class="rank">#</th>
            <td class="name">Name</td>
            <td class="market">Market Cap</td>
            <td class="price">Price</td>
            <td class="volume">Volume (24h)</td>
            <td class="circulate">Circulating Supply</td>
            <td class="change">Change</td>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($data as $key => $value) : ?>
            <tr>
                <th class="rank"><?= $value->cmc_rank; ?></th>
                <td class="name"><img
                            src="https://s2.coinmarketcap.com/static/img/coins/64x64/<?= $value->id; ?>.png"><?= $value->name; ?>
                </td>
                <td class="market">$ <?= formatMoney($value->quote->USD->market_cap); ?></td>
                <td class="price">$ <?= formatMoney($value->quote->USD->price); ?></td>
                <td class="volume">$ <?= formatMoney($value->quote->USD->volume_24h); ?></td>
                <td class="circulate"><?= formatMoney($value->circulating_supply); ?> <?= $value->symbol; ?></td>
                <td class="change"><?= formatMoney($value->quote->USD->percent_change_24h); ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
<!--[javascript]-->

<!--[styleSheet]-->
<style>
    table {width:100%;}
    table thead tr > * {background:#5c99d2 !important;}
    table tr > * {padding:7px 10px; vertical-align:middle;}
    table tr:nth-child(even) > * {background:#eeeeee;}
    table tr td > * {display:inline-block;vertical-align:middle;}
    table tr td.price {color:#0062a9;}
    table tr td.volume {color:#345508;}
    table tr td img {width:20px;height:20px; margin-right:20px;}
</style>