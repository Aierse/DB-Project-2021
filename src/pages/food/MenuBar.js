import styles from "./MenuBar.module.css";
import MenuItem from "./MenuItem";

function MenuBar({ selected, setSelected }) {
  const onChangeEvent = (e) => setSelected(e.target.value);

  return (
    <div className={styles.menuBar}>
      <MenuItem value={"Snack"} checked={selected === "Snack"} onChange={onChangeEvent} />
      <MenuItem value={"Popcorn"} checked={selected === "Popcorn"} onChange={onChangeEvent} />
      <MenuItem value={"Hotdog"} checked={selected === "Hotdog"} onChange={onChangeEvent} />
      <MenuItem value={"Drink"} checked={selected === "Drink"} onChange={onChangeEvent} />
      <MenuItem value={"Set"} checked={selected === "Set"} onChange={onChangeEvent} />
    </div>
  );
}

export default MenuBar;
