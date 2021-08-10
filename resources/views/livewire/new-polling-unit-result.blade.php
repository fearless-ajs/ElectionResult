
<div>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>New Result </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item active">Add Result</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- SELECT2 EXAMPLE -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Add new polling unit result</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form wire:submit.prevent="save">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Polling Unit</label>
                                    <select wire:model="unit" class="form-control {{$errors->has('unit')? 'is-invalid' : '' }}">

                                        @if($units)
                                            <option value="">Select polling unit</option>
                                            @foreach($units as $unit_entry)
                                                <option value="{{$unit_entry->id}}">{{$unit_entry->polling_unit_name}}</option>
                                            @endforeach
                                        @endif

                                    </select>
                                    @error('unit') <span style="color: crimson; font-size: 10px;">{{ $message }}</span> @enderror
                                </div>
                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label>SCORE</label>
                                    <input type="text" wire:model.lazy="score" class="form-control {{$errors->has('score')? 'is-invalid' : '' }}" placeholder="Party Score">
                                    @error('score') <span style="color: crimson; font-size: 10px;">{{ $message }}</span> @enderror
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <!-- /.col -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Party</label>
                                    <select wire:model="party" class="form-control {{$errors->has('party')? 'is-invalid' : '' }}">

                                        @if($parties)
                                            <option value="">Select part</option>
                                            @foreach($parties as $party_entry)
                                                <option value="{{$party_entry->partyid}}">{{$party_entry->partyname}}</option>
                                            @endforeach
                                        @endif

                                    </select>
                                    @error('party') <span style="color: crimson; font-size: 10px;">{{ $message }}</span> @enderror
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->


                        <button wire:loading.remove wire:target="save" type="submit" class="btn btn-primary">Save Result</button>
                        <button disabled wire:loading wire:target="save" type="submit" class="btn btn-primary"> Processing  <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> </button>
                    </form>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    Contact <a href="#">the system administrator if </a> you're not sure of what to do.
                </div>
                <!-- /.card -->

            </div>
            <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

</div>


