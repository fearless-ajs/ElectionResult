
<div>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>LGA Election Results </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('lga-result')}}">Home</a></li>
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
                    <h3 class="card-title">Check Local Government Total Result</h3>

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

                        <div class="row" wire:igonre>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Local Government Area</label>
                                    <select wire:model.lazy="lga" class="form-control {{$errors->has('lga')? 'is-invalid' : '' }}">

                                        @if($lgas)
                                            <option value="">Select Local Government</option>
                                            @foreach($lgas as $lga_entry)
                                                <option value="{{$lga_entry->lga_id}}">{{$lga_entry->lga_name}}</option>
                                            @endforeach
                                        @endif

                                    </select>
                                    @error('lga') <span style="color: crimson; font-size: 10px;">{{ $message }}</span> @enderror
                                </div>
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
                            <h3 class="card-title">Total results for each polling Unit</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div>


                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>UNIT NAME</th>
                                        <th>UNIT NUMBER</th>
                                        <th>UNIT DESCRIPTION</th>
                                        <th>TOTAL RESULT</th>
                                    </tr>
                                    </thead>
                                    @if($units)
                                        @foreach($units as $unit)
                                    <tbody>
                                            <tr>
                                                <td>{{$unit->polling_unit_name}}</td>
                                                <td>{{$unit->polling_unit_number}}</td>
                                                <td>{{$unit->polling_unit_description}}</td>
                                                <td>@livewire('lga-polling-unit-result', ['unit' => $unit])</td>
                                            </tr>
                                    </tbody>

                                        @endforeach

                                    @endif
                                </table>

                            </div>

{{--                            <table id="example1" class="table table-bordered table-striped">--}}
{{--                                <thead>--}}
{{--                                <tr>--}}
{{--                                    <th>UNIT NAME</th>--}}
{{--                                    <th>UNIT NUMBER</th>--}}
{{--                                    <th>UNIT DESCRIPTION</th>--}}
{{--                                </tr>--}}
{{--                                </thead>--}}
{{--                                <tbody>--}}

{{--                                @if($units)--}}
{{--                                    @foreach($units as $unit)--}}
{{--                                        <tr>--}}
{{--                                            <td>{{$unit->polling_unit_name}}</td>--}}
{{--                                            <td>{{$unit->polling_unit_number}}</td>--}}
{{--                                            <td>{{$unit->polling_unit_description}}</td>--}}
{{--                                        </tr>--}}
{{--                                    @endforeach--}}

{{--                                @endif--}}

{{--                                </tbody>--}}
{{--                                <tfoot>--}}
{{--                                <tr>--}}
{{--                                    <th>UNIT NAME</th>--}}
{{--                                    <th>UNIT NUMBER</th>--}}
{{--                                    <th>UNIT DESCRIPTION</th>--}}
{{--                                </tr>--}}
{{--                                </tfoot>--}}
{{--                            </table>--}}
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
