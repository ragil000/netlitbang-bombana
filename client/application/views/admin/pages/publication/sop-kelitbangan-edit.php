<div class="row mt-5">
    <div class="col-12">
        <form action="">
            <div class="card shadow">
                <div class="card-header border-0">
                    <h1>SOP Kelitbangan</h1>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Judul" aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <textarea id="editor" placeholder="Tuliskan disini" autofocus><?=$data[0]['content']?></textarea>                
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 text-right">
                            <button type="button" class="btn btn-default mt-4">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>