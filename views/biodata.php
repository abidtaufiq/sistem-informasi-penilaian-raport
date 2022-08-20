<section class="content-header">
    <h1>
        Biodata Siswa
    </h1>
</section>

<!-- Main content -->
<section class="content">
    <div class="box box-primary">
        <div class="box-body">
            <form action="<?=base_url('siswa/save');?>" method="post">
                <p class="text-red" id="note">* Wajib diisi <br>Note: Jika belum memiliki NISN harap diisi dengan NIK
                </p>
                <!-- Custom Tabs -->
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab_1" data-toggle="tab">Data Induk</a></li>
                        <li><a href="#tab_2" data-toggle="tab">Data Lainnya</a></li>
                        <li><a href="#tab_3" data-toggle="tab">Data Orang Tua</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab_1">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="nis">NIS<span class="text-red">*</span></label>
                                        <input type="hidden" name="idsiswa" value="<?=$row->idsiswa;?>">
                                        <input type="text" class="form-control" id="nis" name="nis"
                                            placeholder="Ex: 2020" value="<?=$row->nis;?>" required readonly>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="nisn">NISN<span class="text-red">*</span></label>
                                        <input type="text" class="form-control" id="nisn" name="nisn"
                                            placeholder="Ex: 0012389567" value="<?=$row->nisn;?>" maxlength="10"
                                            required readonly>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <label for="nama_lengkap">Nama Lengkap<span class="text-red">*</span></label>
                                        <input type="text" class="form-control" id="nama_lengkap" name="nama"
                                            placeholder="Ex: John Andy" value="<?=$row->nama;?>" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="tempat_lahir">Tempat Lahir<span class="text-red">*</span></label>
                                        <input type="text" class="form-control" id="tempat_lahir" name="tmp_lhr"
                                            placeholder="Ex: Manokwari" value="<?=$row->tmp_lhr;?>" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Tanggal Lahir<span class="text-red">*</span></label>
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" class="form-control pull-right datepicker" name="tgl_lhr"
                                                value="<?=$row->tgl_lhr;?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Jenis Kelamin<span class="text-red">*</span></label>
                                        <select class="form-control select2" style="width: 100%;" name="jk"
                                            value="<?=$row->jk;?>" required>
                                            <option value="L" <?=$row->jk=='L'?'selected':'';?>>Laki-Laki</option>
                                            <option value="P" <?=$row->jk=='P'?'selected':'';?>>Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Alamat Lengkap<span class="text-red">*</span></label>
                                        <textarea class="form-control" name="alamat" rows="5"
                                            required><?=$row->alamat;?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="tab_2">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="nik">NIK</label>
                                        <input type="text" class="form-control" id="nik" name="nik"
                                            placeholder="Ex: 9206111027990001" value="<?=$row->nik;?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="hobi">Hobi</label>
                                        <input type="text" class="form-control" id="hobi" name="hobi"
                                            placeholder="Ex: Bulu tangkis" value="<?=$row->hobi;?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="citacita">Cita-Cita</label>
                                        <input type="text" class="form-control" id="citacita" name="citacita"
                                            placeholder="Ex: Polisi" value="<?=$row->citacita;?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Status Dalam Keluarga</label>
                                        <select class="form-control select2" style="width: 100%;" name="sts_anak"
                                            value="<?=$row->sts_anak;?>">
                                            <option value="Anak Kandung"
                                                <?=$row->sts_anak=='Anak Kandung'?'selected':'';?>>Anak Kandung</option>
                                            <option value="Anak Tiri" <?=$row->sts_anak=='Anak Tiri'?'selected':'';?>>
                                                Anak Tiri</option>
                                            <option value="Anak Angkat"
                                                <?=$row->sts_anak=='Anak Angkat'?'selected':'';?>>Anak Angkat</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="jml_sdr">Jumlah Saudara</label>
                                        <input type="text" class="form-control" id="jml_sdr" name="jml_sdr"
                                            placeholder="Ex: 4" value="<?=$row->jml_sdr;?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="anak_ke">Anak Ke Berapa</label>
                                        <input type="text" class="form-control" id="anak_ke" name="anak_ke"
                                            placeholder="Ex: 2" value="<?=$row->anak_ke;?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="tab_3">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nik_ayah">NIK Ayah</label>
                                        <input type="text" class="form-control" id="nik_ayah" name="nik_ayah"
                                            placeholder="Ex: 9206111027990001" value="<?=$row->nik_ayah;?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nik_ibu">NIK Ibu</label>
                                        <input type="text" class="form-control" id="nik_ibu" name="nik_ibu"
                                            placeholder="Ex: 9206111027990001" value="<?=$row->nik_ibu;?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nama_ayah">Nama Ayah</label>
                                        <input type="text" class="form-control" id="nama_ayah" name="nama_ayah"
                                            placeholder="Ex: Father John" value="<?=$row->nama_ayah;?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nama_ibu">Nama Ibu</label>
                                        <input type="text" class="form-control" id="nama_ibu" name="nama_ibu"
                                            placeholder="Ex: Mother John" value="<?=$row->nama_ibu;?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Pendidikan Ayah</label>
                                        <select class="form-control select2" style="width: 100%;" name="pend_ayah"
                                            value="<?=$row->pend_ayah;?>">
                                            <option value="Tidak Sekolah"
                                                <?=$row->pend_ayah=='Tidak Sekolah'?'selected':'';?>>Tidak Sekolah
                                            </option>
                                            <option value="SD/Sederajat"
                                                <?=$row->pend_ayah=='SD/Sederajat'?'selected':'';?>>SD/Sederajat
                                            </option>
                                            <option value="SMP/Sederajat"
                                                <?=$row->pend_ayah=='SMP/Sederajat'?'selected':'';?>>SMP/Sederajat
                                            </option>
                                            <option value="SMA/Sederajat"
                                                <?=$row->pend_ayah=='SMA/Sederajat'?'selected':'';?>>SMA/Sederajat
                                            </option>
                                            <option value="D1" <?=$row->pend_ayah=='D1'?'selected':'';?>>D1</option>
                                            <option value="D2" <?=$row->pend_ayah=='D2'?'selected':'';?>>D2</option>
                                            <option value="D3" <?=$row->pend_ayah=='D3'?'selected':'';?>>D3</option>
                                            <option value="D4" <?=$row->pend_ayah=='D4'?'selected':'';?>>D4</option>
                                            <option value="S1" <?=$row->pend_ayah=='S1'?'selected':'';?>>S1</option>
                                            <option value="S2" <?=$row->pend_ayah=='S2'?'selected':'';?>>S2</option>
                                            <option value="S3" <?=$row->pend_ayah=='S3'?'selected':'';?>>S3</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Pendidikan Ibu</label>
                                        <select class="form-control select2" style="width: 100%;" name="pend_ibu"
                                            value="<?=$row->pend_ibu;?>">
                                            <option value="Tidak Sekolah"
                                                <?=$row->pend_ibu=='Tidak Sekolah'?'selected':'';?>>Tidak Sekolah
                                            </option>
                                            <option value="SD/Sederajat"
                                                <?=$row->pend_ibu=='SD/Sederajat'?'selected':'';?>>SD/Sederajat</option>
                                            <option value="SMP/Sederajat"
                                                <?=$row->pend_ibu=='SMP/Sederajat'?'selected':'';?>>SMP/Sederajat
                                            </option>
                                            <option value="SMA/Sederajat"
                                                <?=$row->pend_ibu=='SMA/Sederajat'?'selected':'';?>>SMA/Sederajat
                                            </option>
                                            <option value="D1" <?=$row->pend_ibu=='D1'?'selected':'';?>>D1</option>
                                            <option value="D2" <?=$row->pend_ibu=='D2'?'selected':'';?>>D2</option>
                                            <option value="D3" <?=$row->pend_ibu=='D3'?'selected':'';?>>D3</option>
                                            <option value="D4" <?=$row->pend_ibu=='D4'?'selected':'';?>>D4</option>
                                            <option value="S1" <?=$row->pend_ibu=='S1'?'selected':'';?>>S1</option>
                                            <option value="S2" <?=$row->pend_ibu=='S2'?'selected':'';?>>S2</option>
                                            <option value="S3" <?=$row->pend_ibu=='S3'?'selected':'';?>>S3</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="pekr_ayah">Pekerjaan Ayah</label>
                                        <input type="text" class="form-control" id="pekr_ayah" name="pekr_ayah"
                                            placeholder="Ex: Polisi" value="<?=$row->pekr_ayah;?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="pekr_ibu">Pekerjaan Ibu</label>
                                        <input type="text" class="form-control" id="pekr_ibu" name="pekr_ibu"
                                            placeholder="Ex: PNS" value="<?=$row->pekr_ibu;?>">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Alamat Lengkap Orang Tua</label>
                                        <textarea class="form-control" name="alamat_ortu"
                                            rows="5"><?=$row->alamat_ortu;?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-success btn-flat btn-sm pull-right"><i class="fa fa-save"></i>
                    Simpan Perubahan</button>
            </form>
        </div>
    </div>
</section>