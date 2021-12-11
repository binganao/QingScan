{include file='public/head' /}
<?php
$dengjiArr = ['Low', 'Medium', 'High', 'Critical'];
?>
<div class="col-md-12 ">
    <?php
    $searchArr = [
        'action' => $_SERVER['REQUEST_URI'],
        'method' => 'get',
        'inputs' => [
            ['type' => 'text', 'name' => 'search', 'placeholder' => 'search']
        ]]; ?>
    {include file='public/search' /}
    <!--    -->
    <!--    <div class="row tuchu">-->
    <!--        <div class="col-md-9">-->
    <!--            <form class="form-inline" method="get" action="--><?php //echo $_SERVER['REQUEST_URI'] ?><!--">-->
    <!--                <input type="text" name="search" class="form-control" placeholder="search" value="-->
    <?php //echo htmlentities($_GET['search']??'') ?><!--">-->
    <!--                <button type="submit" class="btn btn-outline-primary">搜索</button>-->
    <!--            </form>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--    -->

    <div class="row tuchu">
        <!--            <div class="col-md-1"></div>-->
        <div class="col-md-12 ">
            <table class="table table-bordered table-hover table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>APP</th>
                    <th>target</th>
                    <th>http_status</th>
                    <th>plugins</th>
                    <th>发布时间</th>
                    <th style="width: 200px">操作</th>
                </tr>
                </thead>
                <?php foreach ($list as $value) { ?>
                    <tr>
                        <td><?php echo $value['id'] ?></td>
                        <td><?php echo $value['app_name'] ?></td>
                        <td><?php dump(json_decode($value['target'], true)[0]); ?></td>
                        <td><?php dump(json_decode($value['http_status'], true)[0]); ?></td>
                        <td><?php dump(json_decode($value['plugins'], true)[0]); ?></td>
                        <td><?php echo $value['create_time'] ?></td>
                        <td>
                            <!--                            <a href="-->
                            <?php //echo url('xray/details',['id'=>$value['id']])?><!--"-->
                            <!--                               class="btn btn-sm btn-outline-primary">查看漏洞</a>-->
                            <a href="<?php echo url('xray/del', ['id' => $value['id']]) ?>"
                               class="btn btn-sm btn-outline-danger">删除</a>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
    <input type="hidden" id="to_examine_url" value="<?php echo url('to_examine/xray') ?>">

    {include file='public/to_examine' /}
    {include file='public/fenye' /}
</div>
{include file='public/footer' /}