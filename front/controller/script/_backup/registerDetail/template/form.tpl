<div class="breadcrumb-block">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-xs-12">
                <ol class="breadcrumb" data-aos="fade-right" data-aos-once="true">
                    <li><a href="https://www.dmcr.go.th"><span class="fa fa-home"></span>หน้าแรก</a></li>
                    {* <li><a href="{$ul}/information">สารสนเทศ</a></li>
                    <li><a href="{$ul}/information/intranet">ฐานข้อมูลภายใน (Intranet)</a></li> *}
                    <li class="active">แบบสอบถาม</li>
                </ol>
            </div>
            <div class="col-sm-6 col-xs-12">
            	<div class="back" data-aos="fade-left" data-aos-once="true">
            		<a onclick="window.history.back();" class="btn btn-default btn-small">กลับ</a>
            	</div>
            </div>
        </div>
    </div>
</div>

<section>
    <div class="default-header" data-aos="fade-up" data-aos-once="true">
        <div class="container">
            <div class="row">
                <div class="col-xs-6">
                    <div class="whead">
                        <div class="thumb">
                            <figure>
                                <img src="{$template}/public/image/icon/icon-anchor.png" alt="">
                            </figure>
                        </div>
                        <div class="title">
                            <h1>DMCR <strong class="text-primary">QUESTIONNAIRE</strong></h1>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6">
                    <div class="translate">
                        <div id="google_translate_element"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="default-page" data-aos="fade-up" data-aos-once="true">
        <div class="container">
            <div class="bookingRoom">
                <div class="bookingRoom-header">
                    <h2 class="title">แบบฟอร์มส่งคำตอบแบบสอบถาม</h2>
                </div>
            </div>


            <div class="bookingRoom-form">

                {* {if $alertShowError|default:null}
                    <div class="boxmsgError">
                        {$alertShowError}
                    </div>
                {/if} *}
                    <div class="boxmsgError">
                        ข้อมูลด้านล่างนี้ไม่มีผลต่อการกรอกแบบสอบถามใดๆ ทั้งสิ้น
                    </div>

                <form class="form-default" id="myFormQues" name="myFormQues"  method="post" data-toggle="validator" {* onSubmit="submitInsertBooking();"*}>
                    <input type="hidden" name="action" id="action"  value="add" />
                    <input name="f" id="f" type="hidden" value="{$f}">
                    <input name="myid" id="myid" type="hidden" value="{$myid}" >
                   
                    <div class="form-block">
                    <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label class="control-label">ประเภทบุคลากร <span class="require">*</span></label>
                                    <select class="select-control" name="inputGID" id="inputGID" required >
                                        <option value="">เลือกประเภทบุคลากร</option>
                                        <option value="1" >บุคลากรในหน่วยงาน</option>
                                        <option value="2" >บุคลากรภายนอก</option>
                                    </select>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label class="control-label">ชื่อ<span class="require">*</span></label>
                                    <input class="form-control" name="inputFname" id="inputFname" type="text"  value="" required />
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label class="control-label">นามสกุล<span class="require">*</span></label>
                                    <input class="form-control" name="inputLname" id="inputLname" type="text"  value="" required />
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label class="control-label">ที่อยู่</label>
                                    <textarea class="form-control" rows="4" name="inputAddress" id="inputAddress}" required></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            
                        </div>

                        
                        <div class="row">
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label class="control-label">อีเมล์ <span class="require">*</span></label>
                                    <input class="form-control" name="inputEmail" id="inputEmail" type="text"  value="" required />
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label class="control-label">เบอร์โทรศัพท์<span class="require">*</span></label>
                                    <input class="form-control" name="inputTel" id="inputTel" type="text"  value="" required />
                                </div>
                            </div>
                        </div>
                        <div class="captcha form-group">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label class="control-label" for="">รหัสยืนยัน <span class="require">*</span></label>
                                        <div class="captcha-block">
                                          <input class="form-control" type="text" name="captcha" placeholder=""
                                          data-remote-error='Security Code ERROR!'
                                          data-remote="{$ul}/captcha"
                                          required>
                                            {include file="captcha.tpl"}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                  <div class="col-sm-6">
                                    <div class="help-block with-errors">{$register_error.session_captcha|default:""}</div>
                                  </div>
                                </div>
                            </div>
                    </div>

                    
                    

                

                    <div class="form-action">
                        <div class="wrapper">
                            <div>
                                <input value="ยืนยัน" name="" class="btn btn-primary btn-medium" type="submit">
                            </div>
                            <div>
                                <a href="{$ul}/questionare" class="btn btn-secondary btn-medium">ยกเลิก</a>
                            </div>
                        </div>
                    </div>

                    
                </form>
            </div>
        </div>
    </div>
</section>
