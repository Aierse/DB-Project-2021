function Seat() {
  return (
    <div>
      <table class="seat">
        <thead>
          <caption class="screen">스크린</caption>
        </thead>
        <tbody>
          {/* <?php
          for ($i = 1; $i <=5; $i++) {
              echo "<tr>";
              for ($j = 1; $j <= 10; $j++){
                  echo "<td>$i-$j</td>";
              }
              echo "</tr>";
          }
      ?> */}
        </tbody>
      </table>
    </div>
  );
}

export default Seat;
