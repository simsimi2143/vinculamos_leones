@extends('admin.panel')

@section('contenido')
    <section class="section" style="font-size: 115%;">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Listado de Objetivos de Desarrollo Sostenible</h4>
                        </div>
                        <div class="card-body">
                            <div class="col-12">
                            <a class="btn">
                                <img alt="image" src="{{ asset('/img/ods/1.png') }}" width="150">
                            </a>
                            <a class="btn">
                                <img alt="image" src="{{ asset('/img/ods/2.png') }}" width="150">
                            </a>
                            <a class="btn">
                                <img alt="image" src="{{ asset('/img/ods/3.png') }}" width="150">
                            </a>
                            <a class="btn">
                                <img alt="image" src="{{ asset('/img/ods/4.png') }}" width="150">
                            </a>
                            <a class="btn">
                                <img alt="image" src="{{ asset('/img/ods/5.png') }}" width="150">
                            </a>
                            <a class="btn">
                                <img alt="image" src="{{ asset('/img/ods/6.png') }}" width="150">
                            </a>
                            <a class="btn">
                                <img alt="image" src="{{ asset('/img/ods/7.png') }}" width="150">
                            </a>
                            <a class="btn">
                                <img alt="image" src="{{ asset('/img/ods/8.png') }}" width="150">
                            </a>
                            <a class="btn">
                                <img alt="image" src="{{ asset('/img/ods/9.png') }}" width="150">
                            </a>
                            <a class="btn">
                                <img alt="image" src="{{ asset('/img/ods/10.png') }}" width="150">
                            </a>
                            <a class="btn">
                                <img alt="image" src="{{ asset('/img/ods/11.png') }}" width="150">
                            </a>
                            <a class="btn">
                                <img alt="image" src="{{ asset('/img/ods/12.png') }}" width="150">
                            </a>
                            <a class="btn">
                                <img alt="image" src="{{ asset('/img/ods/13.png') }}" width="150">
                            </a>
                            <a class="btn">
                                <img alt="image" src="{{ asset('/img/ods/14.png') }}" width="150">
                            </a>
                            <a class="btn">
                                <img alt="image" src="{{ asset('/img/ods/15.png') }}" width="150">
                            </a>
                            <a class="btn">
                                <img alt="image" src="{{ asset('/img/ods/16.png') }}" width="150">
                            </a>
                            <a class="btn">
                                <img alt="image" src="{{ asset('/img/ods/17.png') }}" width="150">
                            </a>
                            <a class="btn">
                                <img alt="image" src="{{ asset('/img/ods/0.jpg') }}" width="150">
                            </a>
                            </div>
                            {{-- <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nombre</th>
                                            <th>ICONO</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Poner fin a la pobreza en todas sus formas en todo el mundo.</td>
                                            <td>
                                                <a class="btn">
                                                    <img alt="image" src="{{ asset('/img/ods/1.png') }}" width="60">
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Poner fin al hambre, lograr la seguridad alimentaria y la mejora de la nutrición y promover la agricultura sostenible.</td>
                                            <td>
                                                <a class="btn">
                                                    <img alt="image" src="{{ asset('/img/ods/2.png') }}" width="60">
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Garantizar una vida sana y promover el bienestar de todos a todas las edades.</td>
                                            <td>
                                                <a class="btn">
                                                    <img alt="image" src="{{ asset('/img/ods/3.png') }}" width="60">
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>Garantizar una educación inclusiva y equitativa de calidad y promover oportunidades de aprendizaje permanente para todos.</td>
                                            <td>
                                                <a class="btn">
                                                    <img alt="image" src="{{ asset('/img/ods/4.png') }}" width="60">
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>Lograr la igualdad de género y empoderar a todas las mujeres y las niñas.</td>
                                            <td>
                                                <a class="btn">
                                                    <img alt="image" src="{{ asset('/img/ods/5.png') }}" width="60">
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>6</td>
                                            <td>Garantizar la disponibilidad y la gestión sostenible del agua y el saneamiento para todos.</td>
                                            <td>
                                                <a class="btn">
                                                    <img alt="image" src="{{ asset('/img/ods/6.png') }}" width="60">
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>7</td>
                                            <td>Garantizar el acceso a una energía asequible, fiable, sostenible y moderna para todos.</td>
                                            <td>
                                                <a class="btn">
                                                    <img alt="image" src="{{ asset('/img/ods/7.png') }}" width="60">
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>8</td>
                                            <td>Promover el crecimiento económico sostenido, inclusivo y sostenible, el empleo pleno y productivo y el trabajo decente para todos.</td>
                                            <td>
                                                <a class="btn">
                                                    <img alt="image" src="{{ asset('/img/ods/8.png') }}" width="60">
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>9</td>
                                            <td>Construir infraestructuras resilientes, promover la industrialización inclusiva y sostenible y fomentar la innovación.</td>
                                            <td>
                                                <a class="btn">
                                                    <img alt="image" src="{{ asset('/img/ods/9.png') }}" width="60">
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>10</td>
                                            <td>Reducir la desigualdad en los países y entre ellos.</td>
                                            <td>
                                                <a class="btn">
                                                    <img alt="image" src="{{ asset('/img/ods/10.png') }}" width="60">
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>11</td>
                                            <td>Lograr que las ciudades y los asentamientos humanos sean inclusivos, seguros, resilientes y sostenibles.</td>
                                            <td>
                                                <a class="btn">
                                                    <img alt="image" src="{{ asset('/img/ods/11.png') }}" width="60">
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>12</td>
                                            <td>Garantizar modalidades de consumo y producción sostenibles.</td>
                                            <td>
                                                <a class="btn">
                                                    <img alt="image" src="{{ asset('/img/ods/12.png') }}" width="60">
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>13</td>
                                            <td>Adoptar medidas urgentes para combatir el cambio climático y sus efectos.</td>
                                            <td>
                                                <a class="btn">
                                                    <img alt="image" src="{{ asset('/img/ods/13.png') }}" width="60">
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>14</td>
                                            <td>Conservar y utilizar sosteniblemente los océanos, los mares y los recursos marinos para el desarrollo sostenible.</td>
                                            <td>
                                                <a class="btn">
                                                    <img alt="image" src="{{ asset('/img/ods/14.png') }}" width="60">
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>15</td>
                                            <td>Proteger, restablecer y promover el uso sostenible de los ecosistemas terrestres, gestionar sosteniblemente los bosques, luchar contra la desertificación, detener e invertir la degradación de las tierras y detener la pérdida de biodiversidad.</td>
                                            <td>
                                                <a class="btn">
                                                    <img alt="image" src="{{ asset('/img/ods/15.png') }}" width="60">
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>16</td>
                                            <td>Promover sociedades pacíficas e inclusivas para el desarrollo sostenible, facilitar el acceso a la justicia para todos y construir a todos los niveles instituciones eficaces e inclusivas que rindan cuentas.</td>
                                            <td>
                                                <a class="btn">
                                                    <img alt="image" src="{{ asset('/img/ods/16.png') }}" width="60">
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>17</td>
                                            <td>Fortalecer los medios de implementación y revitalizar la Alianza Mundial para el Desarrollo Sostenible.</td>
                                            <td>
                                                <a class="btn">
                                                    <img alt="image" src="{{ asset('/img/ods/17.png') }}" width="60">
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <link rel="stylesheet" href="{{ asset('/bundles/datatables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="{{ asset('/bundles/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('/bundles/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('/js/page/datatables.js') }}"></script>
@endsection
