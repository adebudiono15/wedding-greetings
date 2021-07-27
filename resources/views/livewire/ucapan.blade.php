  <div wire:submit.prevent="store">
    <div class="content-wraper">
        <div class="row text-center justify-content-center">
            <div class="col-lg-3 mt-2">
                <div class="card shadow" style="background: #F66FA9;color:#fff;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $kehadirans_datang }}</h5>
                        <h6 class="card-subtitle mb-2 text-white" style="font-size: 13px;font-weight:500;">Undangan Datang</h6>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 mt-2">
                <div class="card shadow" style="background: #05B2FC;color:#fff;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $ucapans_uandangan }}</h5>
                        <h6 class="card-subtitle mb-2 text-white" style="font-size: 13px;font-weight:500;">Ucapan</h6>
                    </div>
                </div>
            </div>
        </div>
        {{-- insert --}}
        <form action="">
        <div class="container" style="max-width: 600px !important">
            <div class="row mt-4 justify-content-center">
                <div class="col-lg-12">
                    <div class="form-group">
                        <small class="form-text text-muted">Tulis Nama Kamu Disini Yak.</small>
                        <input type="text" class="form-control form-control-sm shadow @error('nama') is-invalid @enderror" wire:model="nama">
                        @error('nama')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <small id="emailHelp" class="form-text text-muted">Apa Kamu Nanti Datang?</small>
                </div>
            </div>
            <div class="row">
                @foreach ($kehadirans as $item)
                <div class="col-lg-4">
                        <div class="form-check">
                                <input class="form-check-input @error('kehadiran') is-invalid @enderror" type="radio"  value="{{ $item->nama }}" wire:model="kehadiran">
                                <label class="form-check-label" style="color: #6c757d!important;font-weight:500;font-size:15px;">{{ $item->nama }}</label>
                                    @error('kehadiran')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                </div>
                @endforeach
            </div>
        
            <div class="row mt-3 text-center justify-content-center">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <textarea class="form-control text-ucapan shadow @error('ucapan') is-invalid @enderror" placeholder="Tulis Ucapan Disini..." rows="6" wire:model="ucapan"></textarea>
                            @error('ucapan')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                <div class="col-lg-12">
                        <button type="submit" class="btn btn-sm btn-kirim shadow">Ucapin</button>
                </div>
                </div>
                
        </div>
        </form>
        {{-- last insert --}}
    </div>

    <hr class="garis mt-2">
    <div class="container" style="width: auto !important; height:300px !important;overflow:auto;">
            <div class=" mt-5">
            @foreach ($ucapans as $item)
           <div class="row">
                <div class="col-lg-12">
                    <p>{{ $item->nama }}</p>
                    <small  class="form-text mt-2"> <i class='bx bx-comment-dots'></i> {{ $item->ucapan }}</small>
                    <small  class="form-text text-muted mt-2">Kehadiran : {{ $item->kehadiran }}</small>
                </div>
           </div>
           <div class="row">
                <div class="col-lg-12">
                     <small class="form-text text-muted mt-2 float-right"><i class='bx bx-time-five' ></i> {{ date('h:i || d-m-Y', strtotime($item->created_at)) }}</small>
                </div>
           </div>
           <hr>
            @endforeach
         </div>
         </div>
  </div>

