import { Link } from "react-router-dom";
import styles from "./Header.module.css";
/**
 * 페이지 최상단을 그려주는 컴포넌트
 */
function Header(value) {
  return (
    <header className={styles.header}>
      <h1>
        <Link to="/">킹갓영화관</Link>
      </h1>
    </header>
  );
}

export default Header;
