<?php 
            $db = mysqli_connect("localhost","root","","capstwo");
            $fetch = mysqli_query($db,"
                SELECT
                    wt.wtransac_id,
                    wt.transaction_ref,
                    wt.totalentrancefee,
                    wt.totalamount,
                    wt.status,
                    wt.checkout_id,
                    wt.checkouturl,
                    wt.payment_id,
                    wt.approvedby,
                    wt.datewadded,
                    aminities.aminities_id,
                    aminities.name,
                    aminities.rates,
                    walkin.walkin_id,
                    walkin.entrancefee,
                    walkin.numberofheads,
                    walkincustomer.wcustomer_id,
                    walkincustomer.firstname,
                    walkincustomer.lastname,
                    walkincustomer.email_address,
                    walkincustomer.phone_number
                FROM
                    walkin_transac AS wt
                LEFT JOIN
                    walkin ON walkin.walkin_id = wt.walkin_id
                LEFT JOIN
                    walkincustomer ON walkincustomer.wcustomer_id = wt.wcustomer_id
                LEFT JOIN
                    aminities ON aminities.aminities_id = wt.aminities_id
            ");