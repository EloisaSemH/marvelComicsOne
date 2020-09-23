<form action="search.php" class="form-row justify-content-left mb-4 text-center mx-auto ">
    <div class="form-group col-lg-3 col-md-6 col-sm-12 ">
        <input type="text" class="form-control" name="search" placeholder="Digite o nome ou título..." required>
    </div>
    <div class="form-group col-lg-3 col-md-6 col-sm-12 ">
        <select class="form-control" name="cat" required>
            <option value="">Categorias</option>
            <option value="creators">Criadores</option>
            <option value="events">Eventos e crossovers</option>
            <option value="comics">Quadrinhos</option>
            <option value="characters">Personagens</option>
            <option value="series">Séries</option>
        </select>
    </div>
    <div class="form-group col-lg-3 col-md-6 col-sm-12 ">
        <select class="form-control" name="orderby">
            <option value="">Ordenar por...</option>
            <option value="a" onclick="OrderBy(this.value);">A-Z</option>
            <option value="z" onclick="OrderBy(this.value);">Z-A</option>
            <option value="modified" onclick="OrderBy(this.value);">Última modificação</option>
            <option value="-modified" onclick="OrderBy(this.value);">Primeira modificação</option>
        </select>
    </div>
    <div class="form-group text-center col-lg-3 col-md-6 col-sm-12 ">
        <button type="submit" class="btn btn-outline-danger">Procurar</button>
    </div>
</form>