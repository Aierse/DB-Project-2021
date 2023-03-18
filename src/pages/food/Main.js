import { useState } from "react";
import MenuBar from "./MenuBar";
import FoodList from "./FoodList";
import styles from "./Main.module.css";

function Main() {
  const [selected, setSelected] = useState("Snack");

  return (
    <div className={styles.foodTable}>
      <MenuBar selected={selected} setSelected={setSelected} />
      <FoodList menu={selected} />
    </div>
  );
}

export default Main;
