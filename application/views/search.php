

                <!-- Begin Page Content -->
                <div class="container-fluid" style="height: 60%;">

                <div style="height: 100%;
                            display: flex;
                            justify-content: center;
                            align-items: center;">
                    <form style="width: 600px;" method="GET" action="<?= base_url('search');?>">
                        <div style="padding-bottom: 10px; text-align:center">
                            <img class="profile-img-card" src="<?php echo base_url('assets/logo.png'); ?>" width="300" height="300" alt="logo">
                        </div>
                        <div class="input-group">
                            <input type="text" name="q" autofocus="autofocus" class="border border-primary rounded-100 form-control bg-light small" placeholder="Pencarian" aria-label="Search" aria-describedby="basic-addon2">
                            <input type="hidden" name="page" value="1">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">
                                    <i class="fas fa-search fa-sm"></i> Search
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <div style="text-align:center; margin-top:10px;">
                        <span>Sistem ini akan membantu anda dalam melakukan pencarian dan mensitasi jurnal atau karya tulis dari Universitas Diponegoro</span>    
                </div>


                </div>
</div>
                <!-- /.container-fluid -->