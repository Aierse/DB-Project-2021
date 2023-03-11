import { Link } from "react-router-dom";
import styles from "./Menu.module.css";

function Menu() {
  return (
    <nav className={styles.menu}>
      <ul>
        <Link to="/">
          <li>상영 영화</li>
        </Link>
        <Link to="/menu/seat">
          <li>좌석 보기</li>
        </Link>
        <Link to="/menu/food">
          <li>음식 보기</li>
        </Link>
      </ul>
    </nav>
  );
}

export default Menu;
