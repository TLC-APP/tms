<div class="panel panel-theme">
    <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-lock"></i> Đăng nhập</h3>
    </div>
    <div class="panel-body">
        <?php echo $this->Form->create('User', array('controller' => 'users', 'action' => 'login', 'role' => 'form')); ?>
        <div class="form-group">
            <label for="exampleInputEmail2" class="sr-only">Username</label>
            <input type="text" maxlength="100" required="required" placeholder="Username" id="exampleInputEmail2" class="form-control" name="data[User][username]">                                </div>
        <div class="form-group">
            <label for="exampleInputPassword2" class="sr-only">Mật khẩu</label>
            <input type="password" id="UserPassword" placeholder="Mật khẩu" class="form-control" name="data[User][password]">                                </div>
        <?php
            if ($this->Session->check('login_times') && $this->Session->read('login_times') > 3) {
                echo $this->Recaptcha->display();
            }
            ?>
        <div class="checkbox">
            <label>
                <input type="hidden" id="UserRemember_" name="data[User][remember]"><input type="checkbox" id="UserRemember" name="data[User][remember]">Ghi nhớ
            </label>
            
        </div>
        <div class="form-group">
            <button class="btn btn-success btn-block" type="submit">Thực hiện</button>                                    
        </div>
        </form>
    </div>
</div>
