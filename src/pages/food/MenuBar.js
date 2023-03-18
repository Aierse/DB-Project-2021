import styles from "./MenuBar.module.css";
import MenuItem from "./MenuItem";

function MenuBar({ selected, setSelected }) {
  const onChangeEvent = (e) => setSelected(e.target.value);

  return (
    <div className={styles.menuBar}>
      <MenuItem value="Snack" selected={selected} setSelected={onChangeEvent} />
      <MenuItem value="Popcorn" selected={selected} setSelected={onChangeEvent} />
      <MenuItem value="Hotdog" selected={selected} setSelected={onChangeEvent} />
      <MenuItem value="Drink" selected={selected} setSelected={onChangeEvent} />
      <MenuItem value="Set" selected={selected} setSelected={onChangeEvent} />
    </div>
  );
}

export default MenuBar;
