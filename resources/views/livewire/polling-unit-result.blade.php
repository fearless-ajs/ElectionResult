
<div>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Election Results </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item active">Results</li>
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
                    <h3 class="card-title">Check Polling Unit Result</h3>

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
                    <form wire:submit.prevent="generate">

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
                            </div>
                            <!-- /.col -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Unit Number</label>
                                    <input type="text" class="form-control" value="{{$unitNo}}" disabled placeholder="Polling unitID to show here">
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <button wire:loading.remove wire:target="generate" type="submit" class="btn btn-primary">Fetch Result</button>
                        <button disabled wire:loading wire:target="generate" type="submit" class="btn btn-primary"> Processing  <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> </button>
                    </form>
                </div>
            </div>
            <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Polling unit results for each party</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>PARTY</th>
                                    <th>SCORE</th>
                                </tr>
                                </thead>
                                <tbody>

                                @if($results)
                                    @foreach($results as $result)
                                <tr>
                                    <td>{{$result->party_abbreviation}}</td>
                                    <td>{{$result->party_score}}</td>
                                </tr>
                                    @endforeach

                                @endif

                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>PARTY</th>
                                    <th>SCORE</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

</div>
