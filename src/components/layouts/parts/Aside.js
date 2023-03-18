import styles from "./Aside.module.css";

import Login from "./Login";
import Menu from "./Menu";

function Aside() {
  return (
    <aside className={styles.aside}>
      <Login />
      <Menu />
    </aside>
  );
}

export default Aside;
