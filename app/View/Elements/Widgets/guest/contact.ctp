<div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-comment"></i>  Ý kiến đóng góp</h3>
                </div>
                <div class="panel-body">
                    <form accept-charset="utf-8" method="post" role="form" action="/users/contact"><div style="display:none;"><input type="hidden" value="POST" name="_method"></div>                                <div class="form-group">
                            <label for="exampleInputEmail2" class="sr-only">Email</label>
                            <input type="email" maxlength="100" required="required" placeholder="Email của bạn" id="exampleInputEmail2" class="form-control" name="data[User][email]">                                </div>
                        <div class="form-group">
                            <label for="exampleInputPassword2" class="sr-only">Nội dung</label>
                            <textarea name="" placeholder="Nội dung" class="form-control" rows="3"></textarea>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="hidden" value="0" id="UserRemember_" name="data[User][remember]"><input type="checkbox" id="UserRemember" value="1" name="data[User][remember]">Gửi mail cho tôi khi có lớp tập huấn mới
                            </label>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success" type="submit">Gửi</button>                                    
                        </div>
                    </form>
                </div>
            </div>