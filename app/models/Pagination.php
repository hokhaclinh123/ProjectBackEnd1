<?php
class Pagination
{
    public function createPageLinks($pageUrl,$totalRow,$perPage,$page) {
        
        $totalPage = ceil($totalRow / $perPage);
        if($page != 1) {
            $active = '';
        }
        else {
            $active = 'disabled';
        }
        $output = '<nav aria-label="Page navigation">
        <ul class="pagination">
          <li class="page-item '.$active.'">
            <a class="page-link" href="'.$pageUrl.'?page='.($page-1).'" aria-label="Previous">
              <span aria-hidden="true">&laquo;</span>
              <span class="sr-only">Previous</span>
            </a>
          </li>';
        for ($i=1; $i<=$totalPage ; $i++) { 
            $active = '';
            if($page == $i) {
                $active = 'active';
            }
            $output.="<li class='page-item $active'><a class='page-link' href='$pageUrl?page=$i'>$i</a></li>";
        }
        if($page != $totalPage) {
            $active = '';
        }
        else {
            $active = 'disabled';
        }
        $output .= ' <li class="page-item '.$active.'">
            <a class="page-link" href="'.$pageUrl.'?page='.($page+1).'" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
                <span class="sr-only">Next</span>
            </a>
        </li>';

        $output .= ' <li class="page-item '.$active.'">
            <a class="page-link" href="'.$pageUrl.'?page='.$totalPage.'" aria-label="Next">
                <span aria-hidden="true">Last</span>
                <span class="sr-only">Next</span>
            </a>
        </li>
        </ul>
        </nav>';  
        return $output;
    }
}
?>
