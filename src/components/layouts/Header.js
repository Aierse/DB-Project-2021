import { Link } from "react-router-dom";
import styles from "./Header.module.css";

function Header() {
  return (
    <header className={styles.header}>
      <h1>
        <Link to="/">킹갓영화관</Link>
      </h1>
    </header>
  );
}

export default Header;
