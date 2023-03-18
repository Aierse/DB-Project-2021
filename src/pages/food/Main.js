import { useState } from "react";
import MenuBar from "./MenuBar";
import MenuTable from "./MenuTable";
import styles from "./Main.module.css";

function Main() {
  const [selected, setSelected] = useState("Snack");

  return (
    <div className={styles.foodTable}>
      <MenuBar selected={selected} setSelected={setSelected} />
      <MenuTable menu={selected} />
    </div>
  );
}

export default Main;
