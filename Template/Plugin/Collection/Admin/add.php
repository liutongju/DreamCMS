
<script src="<?php echo __ROOT__ ?>/Template/Plugin/Collection/js/fuelux.wizard.min.js" ></script>
<div class="page-content">
    <div class="page-header">
        <h1>
            采集管理
            <small>
                <i class="icon-double-angle-right"></i>
                添加采集
            </small>
        </h1>
    </div><!-- /.page-header -->

    <div class="row">
        <div class="col-xs-12">
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-header widget-header-blue widget-header-flat">
                            <h4 class="lighter">向导</h4>
                        </div>

                        <div class="widget-body">
                            <div class="widget-main">
                                <div data-target="#step-container" class="row-fluid" id="fuelux-wizard">
                                    <ul class="wizard-steps">
                                        <li class="active" data-target="#step1">
                                            <span class="step">1</span>
                                            <span class="title">设置列表页规则</span>
                                        </li>

                                        <li data-target="#step2">
                                            <span class="step">2</span>
                                            <span class="title">设置内容页规则</span>
                                        </li>

                                        <li data-target="#step3">
                                            <span class="step">3</span>
                                            <span class="title">设置完成 </span>
                                        </li>
                                    </ul>
                                </div>

                                <hr>
                                <div id="step-container" class="step-content row-fluid position-relative">
                                    <div id="step1" class="step-pane active">

                                        <form id="sample-form" class="form-horizontal">



                                            <div class="form-group has-warning">
                                                <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="inputWarning">内容模型</label>

                                                <div class="col-xs-12 col-sm-5">
                                                    <span class="block input-icon input-icon-right">
                                                        <select id="mid">
                                                            <?php
                                                            foreach ($modellist as $li)
                                                            {
                                                                ?>
                                                                <option value="<?php echo $li['id']; ?>"><?php echo L($li['title']); ?></option>
                                                            <?php }
                                                            ?>

                                                        </select>
                                                    </span>
                                                </div>
                                                <div class="help-block col-xs-12 col-sm-reset inline">

                                                </div>
                                            </div>

                                            <div class="form-group has-warning">
                                                <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="inputWarning">采集名称</label>

                                                <div class="col-xs-12 col-sm-5">
                                                    <span class="block input-icon input-icon-right">
                                                        <input type="text" class="width-100" id="inputWarning">
                                                    </span>
                                                </div>
                                                <div class="help-block col-xs-12 col-sm-reset inline">

                                                </div>
                                            </div>

                                            <div class="form-group has-warning">
                                                <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="inputWarning">列表页地址</label>

                                                <div class="col-xs-12 col-sm-5">
                                                    <span class="block input-icon input-icon-right">
                                                        <input type="text" class="width-100" id="inputWarning">
                                                        <i class="icon-leaf"></i>
                                                    </span>
                                                </div>
                                                <div class="help-block col-xs-12 col-sm-reset inline">
                                                    页码用{$page}代替
                                                </div>
                                            </div>

                                            <div class="form-group has-error">
                                                <label class="col-xs-12 col-sm-3 col-md-3 control-label no-padding-right" for="inputWarning">内容页规则</label>

                                                <div class="col-xs-12 col-sm-5">
                                                    <label class="col-xs-2 col-sm-2 control-label " for="inputWarning">对象</label>
                                                    <span class="block input-icon pull-left col-sm-4">
                                                        <input type="text" class="width-100 " id="inputWarning">
                                                    </span>
                                                    <label class="col-xs-2 col-sm-2 control-label no-padding-right" for="inputWarning">属性</label>
                                                    <span class="block input-icon pull-right col-sm-4">
                                                        <select class=" width-100 ">
                                                            <option>href</option>
                                                            <option>html</option>
                                                            <option>text</option>

                                                        </select>
                                                    </span>
                                                </div>
                                                <div class="help-block col-xs-12 col-sm-reset inline"> 获取内容页地址规则 </div>
                                            </div>

                                        </form>


                                    </div>

                                    <div id="step2" class="step-pane">
                                        <form id="sample-form" class="form-horizontal ">
                                            <div class="pull-left  col-xs-12 col-sm-3 ">
                                                <ul id="fieldlist" class="list-unstyled spaced2 col-xs-12 col-sm-12 control-label no-padding-right">

                                                </ul>
                                            </div>
                                            <div class="pull-left  col-xs-9  has-warning">

                                                <div class="col-xs-12 col-sm-12 form-group">
                                                    <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="inputWarning"  id="setwho">设置规则</label>
                                                    <div class="col-xs-12 col-sm-8">
                                                        <span class="block input-icon-right">
                                                            <label class="col-xs-12 col-sm-2 control-label no-padding-right" for="inputWarning">类型</label>
                                                            <span class="block input-icon pull-left col-sm-4">
                                                                <select class="datatype" id="fieldruletype" autocomplete="off">
                                                                    <option value="0">单条数据</option>
                                                                    <option value="1">多条数据</option>
                                                                </select>
                                                            </span>
                                                        </span>
                                                    </div>
                                                </div>

                                                <div class="col-xs-12 col-sm-12 form-group singlediv">
                                                    <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="inputWarning">设置规则</label>
                                                    <div class="col-xs-12 col-sm-8">
                                                        <span class="block input-icon-right">
                                                            <label class="col-xs-12 col-sm-2 control-label no-padding-right" for="inputWarning">对象</label>
                                                            <span class="block input-icon pull-left col-sm-4">
                                                                <input type="text" class="width-100 " id="SingleObj">
                                                            </span>
                                                        </span>

                                                        <span class="block input-icon-right">
                                                            <label class="col-xs-12 col-sm-2 control-label no-padding-right" for="inputWarning">属性</label>
                                                            <span class="block input-icon pull-left col-sm-4">
                                                                <input type="text" class="width-100 " id="SingleAttr">
                                                            </span>
                                                        </span>

                                                    </div>
                                                </div>


                                                <div class="muiltdiv">
                                                    <div class="col-xs-12 col-sm-12 form-group ">
                                                        <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="inputWarning">设置规则</label>
                                                        <div class="col-xs-12 col-sm-8">
                                                            <span class="block input-icon-right">
                                                                <label class="col-xs-12 col-sm-2 control-label no-padding-right" for="inputWarning">列表对象</label>
                                                                <span class="block input-icon pull-left col-sm-4">
                                                                    <input type="text" class="width-100 " id="ListObj">
                                                                </span>
                                                            </span>
                                                        </div>
                                                    </div>


                                                    <div class="col-xs-12 col-sm-12 form-group muiltdatadiv">
                                                        <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="inputWarning"></label>
                                                        <div class="col-xs-12 col-sm-8">

                                                            <span class="block input-icon-right">
                                                                <label class="col-xs-12 col-sm-2 control-label no-padding-right" for="inputWarning">数据名</label>
                                                                <span class="block pull-left col-sm-2">
                                                                    <input type="text" name="dataname[]"  class="width-100 " id="listdataname">
                                                                </span>
                                                            </span>

                                                            <span class="block input-icon-right">
                                                                <label class="col-xs-12 col-sm-1 control-label no-padding-right" for="inputWarning">对象</label>
                                                                <span class="block  pull-left col-sm-3">
                                                                    <input type="text" name="objname[]"  class="width-100 " id="listdataobj">
                                                                </span>
                                                            </span>

                                                            <span class="block input-icon-right">
                                                                <label class="col-xs-12 col-sm-2 control-label no-padding-right" for="inputWarning">属性</label>
                                                                <span class="block pull-left col-sm-2">
                                                                    <input type="text" name="attr[]" class="width-100 " id="listdataattr">
                                                                </span>
                                                            </span>
                                                        </div>
                                                        <a class="icon-plus" id="addlist" for="" href="javascript:addrulelist()"></a>
                                                    </div>
                                                </div>

                                                <div class="col-xs-12 col-sm-12 form-group ">
                                                    <button type="button" id="setrulebtn"  class=" btn-xs pull-right btn btn-success" >设置</button>

                                                </div>

                                            </div>
                                        </form>
                                    </div>

                                    <div id="step3" class="step-pane">
                                        <div class="center">
                                            <h3 class="blue lighter">This is step 3</h3>
                                        </div>
                                    </div>


                                </div>

                                <hr>
                                <div class="row-fluid wizard-actions">
                                    <button class="btn btn-prev" disabled="disabled">
                                        <i class="icon-arrow-left"></i>
                                        Prev
                                    </button>

                                    <button data-last="Finish " class="btn btn-success btn-next">
                                        Next
                                        <i class="icon-arrow-right icon-on-right"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div id="hids">
        <input type="hidden" value="" id="nowsetfield"  />
    </div>

    <div id="HidListObjdata" style="display: none">
        <div class="col-xs-12 col-sm-12 form-group muiltdatadiv ">
            <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="inputWarning"></label>
            <div class="col-xs-12 col-sm-8">

                <span class="block input-icon-right">
                    <label class="col-xs-12 col-sm-2 control-label no-padding-right" for="inputWarning">数据名</label>
                    <span class="block pull-left col-sm-2">
                        <input type="text" name="dataname[]" class="width-100 " id="listdataname">
                    </span>
                </span>

                <span class="block input-icon-right">
                    <label class="col-xs-12 col-sm-1 control-label no-padding-right" for="inputWarning">对象</label>
                    <span class="block pull-left col-sm-3">
                        <input type="text" name="objname[]" class="width-100 " id="listdataobj">
                    </span>
                </span>

                <span class="block input-icon-right">
                    <label class="col-xs-12 col-sm-2 control-label no-padding-right" for="inputWarning">属性</label>
                    <span class="block pull-left col-sm-2">
                        <input type="text" name="attr[]" class="width-100 " id="listdataattr">
                    </span>
                </span>

            </div>
        </div>

    </div>
    <script src="http://www.daimajiayuan.com/download/201312/yulan/ace/assets/js/ace-elements.min.js"></script>
    <script src="<?php echo __ROOT__ ?>/Template/Plugin/Collection/js/json2.js" ></script>
    <script type="text/javascript">

        jQuery(function ($) {
            $('#fuelux-wizard').ace_wizard().on('change', function (e, info) {
                if (info.step == 1)
                {
                    $.ajax({
                        type: "post",
                        url: "<?php echo URL('Collection/Admin/getfields', '', 'Plugin.php'); ?>",
                        data: {mid: $('#mid').val()},
                        dataType: "json",
                        success: function (data) {
                            var html = '';
                            $.each(data, function (i, item) {
                                html += '<li><a href="javascript:void(0)" attr="' + item.fieldname + '" class="fieldlist">';
                                html += item.title;
                                html += '</a></li>';
                            });
                            $('#fieldlist').html(html);
                        }

                    });
                }
            });
        })
        $(function () {
            $('.muiltdiv').hide();
            $('.singlediv').show();
            $('.datatype').change(function () {
                if ($(this).val() == 1)
                {
                    setListShow();
                }
                else
                {
                    setSingleShow();
                }
            });

        });

        var Dataobj = {
            'type': 1,
            'obj': '',
            'val': new Array()
        };

        var singleData = {
            'obj': '',
            'attr': ''
        };

        var listData = {
            'data': '',
            'obj': '',
            'attr': ''
        };
        $(function () {
            $(document).on('click', '.fieldlist', function () {

                $('#setwho').html('设置' + $(this).text());
                $('#nowsetfield').val($(this).attr('attr'));
                //获取已经设置好的字段规则信息
                if ($('#' + $(this).attr('attr') + '_rule').length > 0)
                {
                    ruleVal = JSON.parse($('#' + $(this).attr('attr') + '_rule').val());
                    setData(ruleVal);
                    if (ruleVal.type == 1)
                    {
                        setListShow();
                    } else
                    {
                        setSingleShow();
                    }
                }
                else
                {
                    setSingleShow();
                }

            });
            $('#setrulebtn').click(function () {
                Dataobj.type = $('#fieldruletype').val();
                nowsetfield = $('#nowsetfield').val();
                if ($('#fieldruletype').val() == 0)//0 单条数据 1 多条数据
                {
                    //获取对象和属性
                    Dataobj.obj = $('#SingleObj').val();
                    Dataobj.val[0] = new Array($('#SingleAttr').val())
                }
                else
                {
                    //获取多条数据名对象和属性
                    Dataobj.obj = $('#ListObj').val();
                    $(".muiltdatadiv").each(function (index, element) {
                        var data = new Array($(this).find('#listdataname').val(), $(this).find('#listdataobj').val(), $(this).find('#listdataattr').val());
                        Dataobj.val[index] = data;
                    });
                }
                var ruleJson = JSON.stringify(Dataobj);//序列化之后的值 存放到隐藏域。
                if ($('#' + nowsetfield + '_rule').length > 0)
                {
                    $('#' + nowsetfield + '_rule').val(ruleJson);
                }
                else
                {
                    $('#hids').append('<input type="" value=\'' + ruleJson + '\' id="' + nowsetfield + '_rule" name="' + nowsetfield + '_rule" />')
                }
            });
        })

        function setSingleShow()
        {
            $('.muiltdiv').hide();
            $('.singlediv').show();
        }
        function setListShow()
        {
            $('.muiltdiv').show();
            $('.singlediv').hide();
        }

        function setData(dataobj)
        {
            $('#fieldruletype').val(dataobj.type);
            if (dataobj.type == 1)
            {
                //多数据
                $('#ListObj').val(dataobj.obj);
                $.each(dataobj.val, function (i, v) {
                    $('#HidListObjdata').find('#listdataname').val();
                    $('#HidListObjdata').find('#listdataobj').val();
                    $('#HidListObjdata').find('#listdataattr').val();
                });
            }
            else
            {
                $('#SingleObj').val(dataobj.obj);
                var vals = dataobj.val[0];
                $('#SingleAttr').val(vals[0]);
                //单条数据
            }
        }

        function addrulelist()
        {
            $('.muiltdiv').append($('#HidListObjdata').html());
        }
    </script>