
<div class="signup-form">

    <form action="<?= $result ?   './updateteam'  : './insertteam' ?>" method="post">

		<h2><?=$title?></h2>

		<p class="hint-text">Fill below form.</p>
       
        <div class="form-group">
            <input type="text" value="<?= $result ? $result->getName() : ''?>"  class="form-control" name="Name" placeholder="Enter team name  " required="true" >
        </div>

        <div class="form-group">
        	<input type="test" value="<?= $result ? $result->getCoach() : ''  ?>" class="form-control" name="Coach" placeholder="Enter coach name" required="true">
        </div>
		
		<div class="form-group">
            <textarea class="form-control" name="Number" placeholder="Enter the team number" required="true"><?= $result ? $result->getNumber() : ''  ?></textarea>
        </div>
		<input type="hidden" name="id" value="<?= $result ? $result->getId() : ''?>" >
      
		<div class="form-group">
            <button type="submit" class="btn btn-success btn-lg btn-block" name="submit"><?= $result ? 'UPDATE' : 'ADD'?></button>
        </div>

    </form>

	<div class="text-center">View Allready Inserted Data!!  <a href="../../">View</a></div>
    
</div>

