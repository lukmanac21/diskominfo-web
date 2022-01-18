<footer>
    <div class="footer-area">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <div class="footer-content">
            <div class="footer-head">
                <div class="footer-logo">
                  <h2><span>K</span>OMINFO</h2>
                </div>
                <p style="text-align:justify"><?= $general['quotes']?></p>
                <div class="footer-icons">
                <ul>
                  <?php foreach($sosialmedia as $data){?>
                    <li>
                      <a href="<?= $data->link?>"><i class="<?= $data->icon?>"></i></a>
                    </li>
                  <?php }?>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <!-- end single footer -->
          <div class="col-md-4">
          </div>
          <!-- end single footer -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="footer-content">
              <div class="footer-head">
                <h3>Statistik Pengunjung</h3>
                <table id="foot-table-list">
                <tr> 
                  
                    <td>Pengunjung Hari ini</td>
                  
                    <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                  
                    <td><?= $pengunjunghariini?> Orang</td>
                  
                </tr>
                <tr>
                  
                    <td>Total Pengunjung</td> 
                  
                    <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                  
                    <td><?= $totalpengunjung?> Orang</td>
                  
                </tr>
                <tr>
                  
                    <td>Pengunjung Online</td>
                  
                    <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                  
                    <td><?= $pengunjungonline?> Orang</td>
                  
                </tr>
                </table>
              </div>
            </div>
          </div>
        </div>
        </div>
      </div>
    </div>
    <div class="footer-area-bottom">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="copyright text-center">
              <p>
                <?= $general['footer']?>
            </div>
            <div class="credits">
              Designed by Universitas Brawijaya
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer><!-- End  Footer -->