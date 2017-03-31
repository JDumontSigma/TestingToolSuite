<main class="main" id="main" role="main">
   <section class="log">
      <section class="half">
         <section class="brand">
           <div class="holder">
             <img src="./assets/img/sigma-logo.svg" alt="WeAreSigma">
             <h1>Evaluation Tool Suite</h1>
             <h2>"Delivering exceptional digital solutions and improved user experience for all"</h2>
           </div>
         </section>
       </section>

      <section class="half">
         <section class="login">
           <form action="./php/functions/_login.php" method="POST" id="login">
             <label for="username">Please enter your username</label>
             <input type="text" id="username" name="username" placeholder="Username" minlength=5 required >
             <label for="">Please enter your passworrd</label>
             <input type="password" id="password" name="password" placeholder="Password" minlength=4 required>
            <button type="submit">Login</button>
          </form>
        </section>
      </section>
   </section>
 </main>
