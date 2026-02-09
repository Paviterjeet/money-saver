<?= $this->include('header') ?>

<div class="container mt-4">

<h1>Monthly Savings Report</h1>
<p>Total: ₹<?= number_format($total,2) ?></p>

<ul>
<?php foreach($daily as $d): ?>
<li><?= $d['day'] ?> : ₹<?= $d['total'] ?></li>
<?php endforeach; ?>
</ul>
<a href="/analytics/pdf" target="_blank">📄 Download PDF</a>

</div>
<?= $this->include('footer') ?>
