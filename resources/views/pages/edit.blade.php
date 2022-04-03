<x-app-layout>
    <div class="mt-10 sm:mt-0">
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
                <div class="px-4 sm:px-0">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Informations personnelles</h3>
                    <p class="mt-1 text-sm text-gray-600">
                        Utilisez une adresse email permanente pour recevoir vos courriels
                    </p>
                </div>
            </div>
            <div class="mt-2 md:mt-0 md:col-span-2">
                <form method="post" action="{{action('App\Http\Controllers\CarteEncController@update', $id)}}">
                    @csrf
                    <input name="_method" type="hidden" value="PATCH">
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <div class="grid grid-cols-6 gap-6">

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="nomEtudiant">Nom étudiant:</label>
                                    <input type="text" class="form-control" name="nomEtudiant" value="{{$carteEtudiant->nomEtudiant}}">
                                </div><br>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="prenomEtudiant">Prenom étudiant:</label>
                                    <input type="text" class="form-control" name="prenomEtudiant" value="{{$carteEtudiant->prenomEtudiant}}">
                                </div><br>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="Email">Email</label>
                                    <input type="text" class="form-control" name="Email" value="{{$carteEtudiant->Email}}">
                                </div><br>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="DateEntreEnc">Date:</label>
                                    <input type="date" class="form-control" name="DateEntreEnc" value="{{$carteEtudiant->DateEntreEnc}}">
                                </div><br>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="Téléphone">Tel:</label>
                                    <input type="tel" class="form-control" name="Téléphone" value="{{$carteEtudiant->Téléphone}}">
                                </div><br>

                                <div class="col-span-6 sm:col-span-3">
                                    <label>
                                        Section :
                                        <select name="section">
                                            <option value="SLAM">SLAM</option>
                                            <option value="SISR">SISR</option>
                                        </select>
                                    </label>
                                </div>

                                <div class="col-span-6 sm:col-span-4">
                                    <label for="Fichier">Fichier CV : </label>
                                    <input type="file"  name="Fichier" value="{{$carteEtudiant->Fichier}}">
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <button type="submit"><a style="color:limegreen;">Update</a></button>
                                </div>

                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
