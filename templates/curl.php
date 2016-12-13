<?php
//var_dump($json);
//var_dump($result);
//$x=$result;
//$json['sourceId']
?>
<div class="container">
    <p class="currency" id="eur" href="/curl?curr=eur">EUR</p>
    <a class="currency" id="usd" href="/curl?curr=usd">USD</a>
    <a class="currency" id="rub" href="/curl?curr=rub">RUB</a>
    <table id="lst_tbl" class="table table-bordered">
        <thead>
        <tr>
            <th>City</th>
            <th>Bank</th>
            <th>Покупка</th>
            <th>Продажа</th>
        </tr>
        </thead>
        <tbody>
            <?php foreach ($json['organizations'] as $ky=>$val):
                ?>
<tr id="">

    <td>
        <p> <?php
        echo($val['title']);

            ?></p>
    </td>
    <td>
        <?php echo($json['cities'][$val['cityId']]); ?>
    </td>
    <td>
        <?php
        echo($val['currencies'][isset($_GET['curr'])?strtoupper($_GET['curr']): 'USD']['ask']);
        ?>
    </td>
    <td>
        <?php
        echo($val['currencies'][isset($_GET['curr'])?strtoupper($_GET['curr']): 'USD']['bid']);
        ?>
    </td>
</tr>
        <?php endforeach; ?>
</tbody>
</table>
<div id="post_content">
</div>
</div>

<?php include '/layout.php'; ?>

<script type="text/javascript">
    var x = <?php echo $result; ?>//;
console.log(x);
</script>