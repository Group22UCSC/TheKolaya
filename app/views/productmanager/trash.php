        <!-- updateAuction table -->
        <?php
            $x = count($data1);
            $dateToday=date("Y-m-d");
            for($i = 0; $i < $x; $i++) {
          
            $dt = date('Y-m-d', strtotime($data1[$i]['date']));
                 echo'<tr>
                    <td class="tdcls">'.$data1[$i]['date'].'</td>
                    <td class="tdcls">'.$data1[$i]['product_id'].'</td>
                    <td class="tdcls">'.$data1[$i]['product_name'].'</td>
                    <td class="tdcls">'.$data1[$i]['sold_amount'].'</td>
                    <td class="tdcls">'.$data1[$i]['sold_price'].'</td>
                    <td class="tdcls">'.$data1[$i]['name'].'</td>
                    <td class="tdcls">'.$data1[$i]['sold_amount']*$data1[$i]['sold_price'].'</td>
                    <td class="tdcls">'.
                                        (($dt==$dateToday)?  '<a class="deleteBtn" href="">Delete</a>': " NoAction ")  .'</td>
                </tr>';
                    
            }
          ?>