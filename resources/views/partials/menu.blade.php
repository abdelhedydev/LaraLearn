   <nav class="navbar">
     <div class="navbar-brand">
       <a class="navbar-item" href="/">
         <img src="https://bulma.io/images/bulma-logo.png" alt="Bulma: a modern CSS framework based on Flexbox" width="112" height="28">
       </a>
       <div class="navbar-burger burger" data-target="navbarExampleTransparentExample">
         <span></span>
         <span></span>
         <span></span>
       </div>
     </div>

     <div id="navbarExampleTransparentExample" class="navbar-menu">
       <div class="navbar-start">
         <a class="navbar-item" href="/">
           Home
         </a>

       </div>

       <div class="navbar-end">
         <div class="navbar-item">
           <div class="field is-grouped">
             @if (Auth::guest())

             <p class="control">
               <a class="bd-tw-button button" target="_blank" href="{{ route('login') }}">
                 <span class="icon">
                   <i class="fa fa-user-circle-o"></i>
                 </span>
                 <span>
                   Login
                 </span>
               </a>
             </p>
             <p class="control">
               <a class="button is-primary"  href="{{ route('register') }}">
                 <span class="icon">
                   <i class="fa fa-user-o"></i>
                 </span>
                 <span>Register</span>
               </a>
             </p>
           @else
             <p class="control">{{ Auth::user()->name }}  <i class="dropdown icon"></i></p>
           @endif
           </div>
         </div>
       </div>
     </div>
   </nav>
