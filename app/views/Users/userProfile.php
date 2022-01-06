<?php 
  require APPROOT . '/views/includes/head.php';

?>


<div id="logo-landing">

  <h3 class="btn-login"><a href="<?php echo URLROOT; ?>/Users/logout">Log out</a></h3>

<img  id="logoimg" src="<?php echo URLROOT ?>/public/img/logo.png" alt="" height="140%"  >
  

</div>

<div id="section-landing">


<?php
    require APPROOT . '/views/includes/navigation.php';
?>
</div>

</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>





    <h2>Mes annonces</h2>
<div class="table-wrapper">

    <table class="fl-table">
        <thead>
        <tr>
            
            <th>Annonce</th>
            <th>Point de départ</th>
            <th>Point d'arrivee</th>
            <th>Type de transport</th>
            <th>Moyen de transport</th>
            <th>Fourchette de Poids</th>
            <th>Fourchette de volume</th>
            <th>Prix</th>
            <th>Etat de l'annonce</th>
            <th>Modifier</th>



        </tr>
        </thead>
        <tbody>
          
        <?php $i=0;foreach($data['annonces'] as $annonce): ?>
          <?php if( $_SESSION['user_id']==$annonce->userid ): ?>

        <tr>

            <th>Annoce <?php echo ++$i; ?></th>
            <td><?php echo $annonce->pointdepart ?></td>
            <td><?php echo $annonce->pointarrive ?></td>
            <td><?php echo $annonce->transporttype ?></td>
            <td><?php echo $annonce->transport?></td>
            <td><?php echo $annonce->fourchettepoid ?></td>
            <td><?php echo $annonce->fourchettevolume ?></td>
            <td><?php echo $annonce->Etat ?></td>
            <td><?php echo $annonce->prix ?></td>
            <?php if( $annonce->Etat !='Termine') :?>
            <td><input class='button1' type='button' onclick="location.href= '<?php echo URLROOT; ?>/Users/modifierAnnonce?idannonce=<?php echo $annonce->idannonce?>'" alt=""  value="Modifier"/></td>
              <?php endif ;?>
            
        </tr>
        <?php endif;?>
        <?php endforeach ?>
        <tbody>
    </table>
  
</div>





<?php if( ($_SESSION['transporteur']=='no') ||($_SESSION['transporteurcertifie']=='no')): ?>

<h2>Mes Transactions</h2>
<div class="table-wrapper">

<table class="fl-table">
    <thead>
    <tr>
        
        <th>Annonce</th>
        <th>Nom du taransporteur</th>
        <th>Téléphone du transporteur</th>
        <th>Type de transport</th>
        <th>Prix du transport</th>
        <th>Ma Réponse</th>
        <th>Réponse transporteur</th>
        <th>Confirmer la transaction</th>
       

    </tr>
    </thead>
    <tbody>
      
    <?php foreach($data['transactionsclient'] as $transaction): ?>
      <?php if( $_SESSION['user_id']== $transaction->userid ): ?>

    <tr>

        <th>Annoce </th>
        <td><?php echo $transaction->username ?></td>
        <td><?php echo $transaction->numtelephone ?></td>
        <td><?php echo $transaction->transporttype ?></td>
        <td><?php echo $transaction->prix?></td>   
        <td><?php echo $transaction->Avisclient?></td>
        <td><?php echo $transaction->Avistrans?></td>

        <?php if($transaction->Avistrans =='En Attente') :?>
            <td><input class='button1' type='button' onclick="location.href='<?php echo URLROOT; ?>/Users/confirmerClient?idtrans=<?php echo $transaction->idtrans ?>'" alt="Confirmer"  value="Confirmer"/></td>
        <?php endif ;?>
       
       
        
    </tr>
    <?php endif;?>
    <?php endforeach; ?>
    <tbody>
</table>

</div>


<?php endif;?>




<?php if( ($_SESSION['transporteur']=='yes') ||($_SESSION['transporteurcertifie']=='yes')): ?>

<h2>Mes Transactions</h2>
<div class="table-wrapper">

<table class="fl-table">
    <thead>
    <tr>
        
        <th>Annonce</th>
        <th>Nom du client</th>
        <th>Téléphone du client</th>
        <th>Type de transport</th>
        <th>Prix du transport</th>
        <th>Ma Réponse</th>
        <th>Réponse client</th>
        <th>Confirmer la transaction</th>
       

    </tr>
    </thead>
    <tbody>
      
    <?php foreach($data['transactionstransporteur'] as $transaction): ?>
      <?php if( $_SESSION['user_id']== $transaction->id_transporteur ): ?>

    <tr>

        <th>Annonce </th>
        <td><?php echo $transaction->username ?></td>
        <td><?php echo $transaction->numtelephone ?></td>
        <td><?php echo $transaction->transporttype ?></td>
        <td><?php echo $transaction->prix?></td>  
        <td><?php echo $transaction->Avistrans?></td>
        <td><?php echo $transaction->Avisclient?></td>
        
        <?php if($transaction->Avisclient =='Confirme') :?>
            <td><input class='button1' type='button' onclick="location.href='<?php echo URLROOT; ?>/Users/confirmerTransporteur?idtrans=<?php echo $transaction->idtrans ?>&idannonce=<?php echo $transaction->id_annonce?>'" alt="Confirmer"  value="Confirmer"/></td>
        <?php endif ;?>
        
        
        
    </tr>
    <?php endif;?>
    <?php endforeach; ?>
    <tbody>
</table>

</div>


<?php endif;?>




<style>
    *{
    box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
}

h2{
    text-align: center;
    font-size: 18px;
    text-transform: uppercase;
    letter-spacing: 1px;
    color:black;
    padding: 30px 0;
}

/* Table Styles */

.table-wrapper{
    margin: 10px 70px 70px;
    box-shadow: 0px 35px 50px rgba( 0, 0, 0, 0.2 );

    top:50%;
    margin-bottom: 50px;
}

.fl-table {
    border-radius: 5px;
    font-size: 12px;
    font-weight: normal;
    border: none;
    border-collapse: collapse;
    width: 100%;
    max-width: 100%;
    white-space: nowrap;
    background-color: white;
}

.fl-table td, .fl-table th {
    text-align: center;
    padding: 8px;
}

.fl-table td {
    border-right: 1px solid #f8f8f8;
    font-size: 12px;
}

.fl-table thead th {
    color: #ffffff;
    background: #d6d0b8;
}


.fl-table thead th:nth-child(odd) {
    color: #ffffff;
    background: #fac70b;
}

.fl-table tr:nth-child(even) {
    background: #F8F8F8;
}

/* Responsive */

@media (max-width: 767px) {
    .fl-table {
        display: block;
        width: 100%;
    }
    .table-wrapper:before{
        content: "Scroll horizontally >";
        display: block;
        text-align: right;
        font-size: 11px;
        color: white;
        padding: 0 0 10px;
    }
    .fl-table thead, .fl-table tbody, .fl-table thead th {
        display: block;
    }
    .fl-table thead th:last-child{
        border-bottom: none;
    }
    .fl-table thead {
        float: left;
    }
    .fl-table tbody {
        width: auto;
        position: relative;
        overflow-x: auto;
    }
    .fl-table td, .fl-table th {
        padding: 20px .625em .625em .625em;
        height: 60px;
        vertical-align: middle;
        box-sizing: border-box;
        overflow-x: hidden;
        overflow-y: auto;
        width: 120px;
        font-size: 13px;
        text-overflow: ellipsis;
    }
    .fl-table thead th {
        text-align: left;
        border-bottom: 1px solid #f7f7f9;
    }
    .fl-table tbody tr {
        display: table-cell;
    }
    .fl-table tbody tr:nth-child(odd) {
        background: none;
    }
    .fl-table tr:nth-child(even) {
        background: transparent;
    }
    .fl-table tr td:nth-child(odd) {
        background: #F8F8F8;
        border-right: 1px solid #E6E4E4;
    }
    .fl-table tr td:nth-child(even) {
        border-right: 1px solid #E6E4E4;
    }
    .fl-table tbody td {
        display: block;
        text-align: center;
    }
}

    </style>



  