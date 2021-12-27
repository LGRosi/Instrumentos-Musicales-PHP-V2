<main class="container mb-5">
    <h2 class="mb-5 text-center">Ingresar al Panel de Administración</h2>
    <div class="row d-flex justify-content-center">
        <div class="col-4">    
            <form action="acciones/auth-iniciar-sesion.php" method="post">
                <div class="form-fila mb-3">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" class="form-control">
                </div>
                <div class="form-fila mb-3">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" class="form-control">
                </div>
                <button type="submit" class="button btn btn-primary my-3 w-100">Ingresar</button>
            </form>
        </div>
    </div>
</main>
