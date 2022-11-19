<form
   method="POST"
   action="{{ url('/logout') }}"
   class="btn btn-warning text-white font-weight-bold operation-logout"
   id="logout-btn"
>
   @csrf

   @method('POST')

   <i class="fa fa-sign-out me-sm-1"></i>

   <span type="submit" class="d-sm-inline d-none">Cerrar sesión</span>
</form>
   
<script type="text/javascript">
   document.addEventListener("DOMContentLoaded", () => {
      const logout = document.querySelector('#logout-btn');

      logout.addEventListener('click', () => {
         logout.submit();
      });
   });
</script>