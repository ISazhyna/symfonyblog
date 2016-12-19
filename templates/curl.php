<?php
//var_dump($json);
//var_dump($result);
//$x=$result;
//$json['sourceId']
?>
<?php ob_start(); ?>
<div class="container">
    <p class="currency" id="eur" href="/curl?curr=eur">EUR</p>
    <p class="currency" id="usd" href="/curl?curr=usd">USD</p>
    <p class="currency" id="rub" href="/curl?curr=rub">RUB</p>

<!--    <table id="empty" class="table table-bordered">-->
<!--        <thead>-->
<!--        <tr>-->
<!--            <th>Bank</th>-->
<!--            <th>City</th>-->
<!--            <th>Покупка</th>-->
<!--            <th>Продажа</th>-->
<!--        </tr>-->
<!--        </thead>-->
<!--        <tbody id="empty_tbody">-->
<!--        <tr class="tr_empty" >-->
<!---->
<!--                <td class="bank">-->
<!---->
<!--                </td>-->
<!--                <td class="city">-->
<!---->
<!--                </td>-->
<!--                <td class="ask">-->
<!---->
<!--                </td>-->
<!--                <td class="bid">-->
<!---->
<!--                </td>-->
<!--            </tr>-->
<!---->
<!--        </tbody>-->
<!--    </table>-->


    <table id="lst_tbl" class="table table-bordered">
        <thead>
        <tr>
            <th>Bank</th>
            <th>City</th>
            <th>Покупка</th>
            <th>Продажа</th>
        </tr>
        </thead>
        <tbody>
            <?php foreach ($json['organizations'] as $ky=>$val):
                ?>
<!--<tr id=--><?php //echo $val['id'] ?><!-- >-->
<tr id=<?php echo $ky ?> >

    <td>
        <p> <?php
        echo($val['title']);

            ?></p>
    </td>
    <td>
        <?php echo($json['cities'][$val['cityId']]); ?>
    </td>
    <td class="ask">
        <?php
        echo(isset($val['currencies']['EUR'])?$val['currencies']['EUR']['ask']:"empty");
//        var_dump($val['currencies']);
        ?>
    </td>
    <td class="bid">
        <?php
        echo(isset($val['currencies']['EUR'])?$val['currencies']['EUR']['bid']:"empty");
        ?>
    </td>
</tr>
        <?php endforeach; ?>
</tbody>
</table>
<div id="post_content">
</div>
</div>

<?php $content = ob_get_clean(); ?>
<?php include '/layout.php'; ?>

<script type="text/javascript">
    var x = <?php echo $result; ?>;
console.log(x);
</script>