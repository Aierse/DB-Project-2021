import styles from "./FoodList.module.css";
import { useState } from "react";

import 나쵸 from "../../images/food/나쵸.jpg";
import 프레즐 from "../../images/food/프레즐.jpg";
import 츄러스 from "../../images/food/츄러스.jpg";

function FoodList({ menu }) {
  const [list, setList] = useState([]);

  return (
    <div className={styles.foodTable}>
      <table className="foodTable">
        <tbody>
          <tr>
            <td>
              <img src={나쵸} alt="음식 이미지" />
            </td>
            <td>
              <img src={프레즐} alt="음식 이미지" />
            </td>
            <td>
              <img src={츄러스} alt="음식 이미지" />
            </td>
          </tr>
          <tr>
            <td>나쵸</td>
            <td>프레즐</td>
            <td>츄러스</td>
          </tr>
          <tr>
            <td>3000원</td>
            <td>3000원</td>
            <td>3000원</td>
          </tr>
        </tbody>
      </table>
    </div>
  );
}

export default FoodList;
