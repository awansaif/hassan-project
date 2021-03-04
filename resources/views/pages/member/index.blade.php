@extends('layouts.app')
@section('title')
Tesseramento
@endsection

@section('content')
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <!-- Page body start -->
                <div class="page-body">
                    <h2 class="text-primary">Tesseramento Elenco</h2>
                    @if (Session::has('message'))
                    <div class="alert alert-success">
                        {{ Session::get('message') }}
                    </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" id="dataTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nome</th>
                                    <th>E-mail</th>
                                    <th>Residente</th>
                                    <th>via</th>
                                    <th>CODICE POSTALE</th>
                                    <th>Codice fiscale</th>
                                    <th>CLUB DI APPARTENENZA</th>
                                    <th>Genere</th>
                                    <th>Data di nascita</th>
                                    <th>Numero di telefono</th>
                                    <th>Uomini</th>
                                    <th>Donne</th>
                                    <th>Speciale</th>
                                    <th>Veterani</th>
                                    <th>Centro di Salute Mentale</th>
                                    <th>d'accordo</th>
                                    <th>Pagamento totale</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($members as $key => $member)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                <td>{{ $member->name }}</td>
                                <td>{{ $member->email }}</td>
                                <td>{{ $member->resident }}</td>
                                <td>{{ $member->street }}</td>
                                <td>{{ $member->postal_code }}</td>
                                <td>{{ $member->fiscal_code }}</td>
                                <td>{{ $member->club_of_belonging }}</td>
                                <td>{{ $member->gender }}</td>
                                <td>{{ $member->dob }}</td>
                                <td>{{ $member->tel_number }}</td>
                                <td>
                                    @if($member->men == 0)
                                    @else
                                        Yes
                                    @endif
                                </td>
                                <td>
                                    @if($member->women == 0)
                                    @else
                                        Yes
                                    @endif
                                </td>
                                <td>
                                    @if($member->special == 0)
                                    @else
                                        Yes
                                    @endif
                                </td>
                                <td>
                                    @if($member->veterans == 0)
                                    @else
                                        Yes
                                    @endif
                                </td>
                                <td>
                                    @if($member->mental_health_center == 0)
                                    @else
                                        Yes
                                    @endif
                                </td>
                                <td>
                                    @if($member->agree == 0)
                                    @else
                                        Yes
                                    @endif
                                </td>
                                <td>{{ $member->total_payment }}</td>
                                <td>
                                    <a href="{{ url('membership/delete',$member->id) }}" class="btn btn-danger">Remove</a>
                                </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
