<h4>Result</h4>
<div class="row">
    <div class="col-sm-12">
    <div class="text-centre" ><h3>Your Score</h3>
        <?php if(!empty($score))
        {?>
        <h2>You Got {{$score}} out of {{$total}}</h2>
        <?php } else { ?>
        <h2>Please Take test first</h2> <?php } ?>
        </div>
    </div>
</div>

